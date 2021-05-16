<?php
use Illuminate\Support\Facades\Cookie;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Cart;
    function getUserId(){
        if(auth()->check()){
            return auth()->user()->id;
        }else{
            if(Cookie::has('guest_id')){
            }else{
              Cookie::queue(Cookie::make('guest_id', md5(rand(1,500))));
            }
            //Get the cookie value
            return Cookie::get('guest_id');
        }
    }
    function getBrands($featured = null){
        if($featured == 1){
            return Brand::orderBy('title' , 'ASC')->where('is_featured' , 1)->latest()->get();
        }else{
            if($featured == 2){
                return Brand::orderBy('title' , 'ASC')->offset(0)->limit(53)->get();
            }elseif($featured == 3){
                return Brand::orderBy('title' , 'ASC')->offset(53)->limit(55)->get();
            }elseif($featured == 4){
                return Brand::orderBy('title' , 'ASC')->offset(108)->limit(55)->get();
            }else{
                return Brand::orderBy('title' , 'ASC')->get();
            }
        }
    }
    function getCurrency(){
        if(session()->has('currency')){
            if(session()->get('currency') == 'USD'){
                $CurrencySymbole = '$';
                $CurrencyCode = 'USD';
            }elseif(session()->get('currency') == 'EGP'){
                $CurrencySymbole = ' L.E';
                $CurrencyCode = 'EGP';
            }
        }else{
            $CurrencySymbole = '$';
            $CurrencyCode = 'USD';
        }
        return ['symbole' => $CurrencySymbole,'code' => $CurrencyCode];
    }
    function convertCurrency($amount , $from , $to){
        //Check Old Data
        if($to == 'USD'){
            return $amount;
        }else{
            $client = new GuzzleHttp\Client();
            $res = $client->get('https://v6.exchangerate-api.com/v6/e3dd67417f1967a87f031b47/pair/'.$from.'/'.$to);
            if($res->getStatusCode() != 200){
                return "Error !" . $res->getStatusCode();
            }
            $ResponseAsArray = json_decode($res->getBody(), true);
            if(isset($ResponseAsArray['conversion_rate'])){
                $ResponseAsArray['conversion_rate'] = $ResponseAsArray['conversion_rate'];
            }else{
                $ResponseAsArray['conversion_rate'] = 15.7;
            }
            return ceil(($amount *  $ResponseAsArray['conversion_rate']) / 10) * 10;
        }

    }
    function isInUserCart($user_id , $product_id){
        $TheItem = Cart::where('user_id',$user_id)->where('product_id' , $product_id)->where('status' , 'active')->first();
        if($TheItem){
            return true;
        }else{
            return false;
        }
    }
    function userCartCount($user_id){
        return Cart::where('user_id',$user_id)->where('status' , 'active')->count();
    }
    function getMainCategories($gender = null){
        if($gender){
            return Category::where('type' , 'main')->where('gender' , $gender)->latest()->get();
        }else{
            return Category::where('type' , 'main')->latest()->get();
        }
    }
    function getCategories($gender = null){
        if($gender){
            return Category::where('gender' , $gender)->latest()->get();
        }else{
            return Category::latest()->get();
        }
    }
    function getAllBrands(){
        return Brand::latest()->get();
    }
?>