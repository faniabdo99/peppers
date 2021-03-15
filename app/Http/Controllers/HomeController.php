<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
class HomeController extends Controller{
    public function getHomepage(){
        $FeaturedProducts = Product::where('is_featured' , 1)->limit(8)->get();
        $FeaturedBrands = Brand::where('is_featured' , 1)->limit(8)->get();
        return view('index' , compact('FeaturedProducts' , 'FeaturedBrands'));
    }
}
