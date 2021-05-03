<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use Image as ImageLib;
//Models
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
class ProductController extends Controller{
    public function getAll(Request $r,$filter_type = null,$filter_value = null){
        if($filter_type == 'new'){
            $AllProducts = Product::where('status','!=','Hidden')->where('is_new' , 1)->get();
            if($AllProducts->count() < 20){
                $AllNewProductsTwo = Product::where('status','!=','Hidden')->latest()->limit(20-$AllProducts->count())->get();
                $AllProducts = $AllProducts->merge($AllNewProductsTwo);
            }
            return view('product.new', compact('AllProducts'));
        }elseif($filter_type == 'sale'){
            $AllProducts = Product::where('status','!=','Hidden')->where('discount_id' , '!=' , null)->get();
            return view('product.sale', compact('AllProducts'));
        }else{
            if(count($r->all()) > 0 && !$r->has('page')){

                if($r->has('color') && $r->color != ''){
                    $Color = ['color' , $r->color];
                }else{$Color=['color' , '!=' ,'TheForbiddenWord'];}

                if($r->has('size') && $r->size != ''){
                    $Size = ['size' , $r->size];
                }else{$Size=['size' , '!=' ,'TheForbiddenWord'];}

                if($r->has('condition') && $r->condition != ''){
                    $Condition = ['condition' , $r->condition];
                }else{$Condition=['condition' , '!=' ,'TheForbiddenWord'];}

                if($r->has('price_from') && $r->price_from != ''){
                    $PriceFrom = ['price' , '>=' , intval($r->price_from)];
                }else{$PriceFrom=['price' , '=>' ,0];}

                if($r->has('price_to') && $r->price_to != ''){
                    $PriceTo = ['price' , '<=' , intval($r->price_to)];
                }else{$PriceTo=['price' , '<=' ,9999999999999];}
                //There is a filter
                if(!$filter_type){
                    $AllProducts = Product::where('status','!=','Hidden')->where([$Color,$Size,$Condition,$PriceFrom,$PriceTo])->latest();
                    $TheFilter = null;
                }else{
                    if($filter_type == 'brand'){
                        $TheFilter = Brand::where('slug' , $filter_value)->first();
                        if($TheFilter){
                            $Brand = ['brand_id','=',$TheFilter->id];
                            $AllProducts = Product::where('status','!=','Hidden')->where([$Color,$Size,$Condition,$PriceFrom,$PriceTo,$Brand])->latest();
                        }else{
                            $AllProducts = [];
                        }
                    }
                    if($filter_type == 'category'){
                        $TheFilter = Category::where('slug' , $filter_value)->first();
                        if($TheFilter){
                            $AllProducts = Product::where('status','!=','Hidden')->where([$Color,$Size,$Condition,$PriceFrom,$PriceTo])->where('category_id',$TheFilter->id)->latest();
                        }else{
                            $AllProducts = [];
                        }
                    }
            }
            }else{
                //No Filter
                if(!$filter_type){
                    $AllProducts = Product::where('status','!=','Hidden')->latest();
                    $TheFilter = null;
                }else{
                    if($filter_type == 'brand'){
                        $TheFilter = Brand::where('slug' , $filter_value)->first();
                        if($TheFilter){
                            $AllProducts = Product::where('status','!=','Hidden')->where('brand_id',$TheFilter->id);
                        }else{
                            $AllProducts = [];
                        }
                    }
                    if($filter_type == 'category'){
                        $TheFilter = Category::where('slug' , $filter_value)->first();
                        if($TheFilter){
                            $AllProducts = Product::where('status','!=','Hidden')->where('category_id',$TheFilter->id)->latest();
                        }else{
                            $AllProducts = [];
                        }
                    }
                }
            }
            $AllColors = Product::where('status','!=','Hidden')->pluck('color')->unique();
            $AllSizes = Product::where('status','!=','Hidden')->pluck('size')->unique();
            $AllProducts = $AllProducts->get();
            return view('product.all', compact('AllProducts' , 'TheFilter' , 'AllColors' , 'AllSizes' , 'r'));
        }
    }
    public function getSingle($slug){
        $TheProduct = Product::where('status','!=','Hidden')->where('slug' , $slug)->first();
        if(!$TheProduct){abort(404);}
        return view('product.single' , compact('TheProduct'));
    }
    public function getNew(){
        $Brands = Brand::latest()->get();
        $Categories = Category::where('type' , 'main')->latest()->get();
        return view('admin.products.new' , compact('Brands' , 'Categories'));
    }
    public function postNew(Request $r){
        $Rules = [
            'title' => 'required',
            'slug' => 'required|unique:products',
            'category_id' => 'required|integer',
            'status' => 'required',
            'description' => 'required',
            'content' => 'required',
            'color' => 'required',
            'for_gender' => 'required',
            'size' => 'required',
            'condition' => 'required',
            'height' => 'required',
            'width' => 'required',
            'depth' => 'required',
            'brand_id' => 'required|integer',
            'sku' => 'required|unique:products',
            'buy_price' => 'required',
            'price' => 'required',
            'qty' => 'required',
            'store_location' => 'required',
            'image' => 'required|image'
        ];
        $Validator = Validator::make($r->all() , $Rules);
        if($Validator->fails()){
            return back()->withErrors($Validator->errors()->all())->withInput();
        }else{
            $ProductData = $r->except('gallery');
            $ProductData['user_id'] = auth()->user()->id;
            //Upload the product to the system
            if($r->has('image')){
                //Resize the image file & upload it (250x250) (60x60) (650x650)
                $img = ImageLib::make($r->image);
                // backup status
                $img->backup();
                // Tiny Thumb
                $img->fit(60, 60);
                $img->save('storage/app/products/small_thumb/'.strtolower(str_replace(' ' , '-' ,$r->sku)).'.'.$r->image->getClientOriginalExtension());
                $img->reset();
                // Thumb
                $img->fit(250, 250);
                $img->save('storage/app/products/thumb/'.strtolower(str_replace(' ' , '-' ,$r->sku)).'.'.$r->image->getClientOriginalExtension());
                $img->reset();
                // Full Size
                $img->fit(650, 650);
                $img->save('storage/app/products/full_size/'.strtolower(str_replace(' ' , '-' ,$r->sku)).'.'.$r->image->getClientOriginalExtension());
                $img->reset();
                $ProductData['image'] = strtolower(str_replace(' ' , '-' ,$r->sku)).'.'.$r->image->getClientOriginalExtension();
            }
            //Create the product
            $NewProduct = Product::create($ProductData);
            if(count($r->gallery) > 1){
                //Resize the image file & upload it (60x60) (650x650)
                foreach($r->gallery as $key => $Image){
                    $img = ImageLib::make($Image);
                    // backup status
                    $img->backup();
                    // Tiny Thumb
                    $img->fit(60, 60);
                    $img->save('storage/app/products_gallery/small_thumb/'.strtolower(str_replace(' ' , '-' ,$key.$r->sku)).'.'.$Image->getClientOriginalExtension());
                    $img->reset();
                    // Thumb
                    $img->fit(250, 250);
                    $img->save('storage/app/products_gallery/thumb/'.strtolower(str_replace(' ' , '-' ,$key.$r->sku)).'.'.$Image->getClientOriginalExtension());
                    $img->reset();
                    // Full Size
                    $img->fit(650, 650);
                    $img->save('storage/app/products_gallery/full_size/'.strtolower(str_replace(' ' , '-' ,$key.$r->sku)).'.'.$Image->getClientOriginalExtension());
                    $img->reset();
                    //Upload to database
                    ProductImage::create([
                        'image' => strtolower(str_replace(' ' , '-' ,$key.$r->sku)).'.'.$Image->getClientOriginalExtension(),
                        'product_id' => $NewProduct->id
                    ]);
                }
            }
            return back()->withSuccess('Product has been added.');
        }
    }
    public function getSearch(Request $r){
        //Validate the request
        $Rules = [
            'search' => 'required'
        ];
        if(empty($r->search) || $r->search == null){
            return response('The data you entered can not be processed' ,422);
        }else{
            $AllProducts = Product::with('Brand')->where('title' , 'LIKE' , '%'.$r->search.'%')->where('status' , '!=' , 'hidden')->get()->toArray();
            if(count($AllProducts) > 0 ){
                return response($AllProducts , 200);
            }else{
                return response('There is no products matchs your search' , 404);
            }
        }
    }
}
