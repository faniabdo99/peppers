<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
class OrderController extends Controller{
    public function getCheckout(){
        return view('orders.checkout');
    }
    public function postCheckout(Request $r){
        dd($r->all());
    }
}
