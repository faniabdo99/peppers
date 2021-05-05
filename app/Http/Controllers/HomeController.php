<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
class HomeController extends Controller{
    public function getHomepage(){
        $FeaturedBrands = Brand::where('is_featured' , 1)->get();
        //Get the featured products by brand
        $FeaturedProducts = Product::where('status' , '!=' , 'hidden')->where('is_featured' , '1')->limit(8)->get();
        $NewArrivals = Product::where('status' , '!=' , 'hidden')->OrderBy('id' , 'desc')->limit(8)->get();
        return view('index' , compact('FeaturedProducts','FeaturedBrands','NewArrivals'));
    }
}
