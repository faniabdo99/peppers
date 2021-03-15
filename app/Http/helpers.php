<?php 
use App\Models\Brand;
    function getBrands($featured = null){
        if($featured == 1){
            return Brand::where('is_featured' , 1)->latest()->get();
        }else{
            if($featured == 2){
                return Brand::where('is_featured' , '!=', 1)->latest()->offset(0)->limit(53)->get();
            }elseif($featured == 3){
                return Brand::where('is_featured' , '!=', 1)->latest()->offset(53)->limit(55)->get();
            }elseif($featured == 4){
                return Brand::where('is_featured' , '!=', 1)->latest()->offset(108)->limit(55)->get();
            }else{
                return Brand::where('is_featured' , '!=', 1)->latest()->get();
            }
        }
    }
?>