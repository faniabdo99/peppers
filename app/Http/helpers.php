<?php 
use App\Models\Brand;
use App\Models\Cart;
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
    function getCurrency(){
        if(session()->has('currency')){
            if(session()->get('currency') == 'USD'){
                $CurrencySymbole = '$';
                $CurrencyCode = 'USD';
            }elseif(session()->get('currency') == 'EGP'){
                $CurrencySymbole = '£';
                $CurrencyCode = 'EGP';
            }
        }else{
        $CurrencySymbole = '£';
        $CurrencyCode = 'EGP';
        }
        return ['symbole' => $CurrencySymbole,'code' => $CurrencyCode];
    }
    function convertCurrency($amount , $from , $to){
        //Check Old Data
        if($to == 'USD'){
            return $amount;
        }
        $client = new GuzzleHttp\Client();
        $res = $client->get('https://api.exchangerate.host/convert?from='.$from.'&to='.$to);
        if($res->getStatusCode() != 200){
            return "Error !" . $res->getStatusCode();
        }
        $ResponseAsArray = json_decode($res->getBody(), true);
        return sprintf("%.1f",$amount *  $ResponseAsArray['result']);
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
?>