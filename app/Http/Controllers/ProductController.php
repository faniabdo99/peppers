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
    public function getAll(){
        return view('product.all');
    }
    public function getSingle($slug){
        $TheProduct = Product::where('slug' , $slug)->first();
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
                foreach($r->gallery as $Image){
                    $img = ImageLib::make($r->image);
                    // backup status
                    $img->backup();
                    // Tiny Thumb
                    $img->fit(60, 60);
                    $img->save('storage/app/products_gallery/small_thumb/'.strtolower(str_replace(' ' , '-' ,$r->sku)).'.'.$r->image->getClientOriginalExtension());
                    $img->reset();
                    // Thumb
                    $img->fit(250, 250);
                    $img->save('storage/app/products_gallery/thumb/'.strtolower(str_replace(' ' , '-' ,$r->sku)).'.'.$r->image->getClientOriginalExtension());
                    $img->reset();
                    // Full Size
                    $img->fit(650, 650);
                    $img->save('storage/app/products_gallery/full_size/'.strtolower(str_replace(' ' , '-' ,$r->sku)).'.'.$r->image->getClientOriginalExtension());
                    $img->reset();
                    //Upload to database
                    ProductImage::create([
                        'image' => strtolower(str_replace(' ' , '-' ,$r->sku)).'.'.$r->image->getClientOriginalExtension(),
                        'product_id' => $NewProduct->id
                    ]);
                }
            }
            return back()->withSuccess('Product has been added.');
        }
    }
}
