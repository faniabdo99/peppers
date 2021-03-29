<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
class HomeController extends Controller{
    public function getHomepage(){
        $FeaturedBrands = Brand::where('is_featured' , 1)->limit(8)->get();
        //Get the featured products by brand
        $FeaturedProducts = $FeaturedBrands->map(function($TheBrand){
            $BrandProduct = Product::where('brand_id' , $TheBrand->id)->first();
            if($BrandProduct){
                return $BrandProduct;
            }else{
               return null;
            }
        });
        return view('index' , compact('FeaturedProducts' , 'FeaturedBrands'));
    }
}
