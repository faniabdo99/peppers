<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class OrderController extends Controller{
    public function getCheckout(){
        return view('orders.checkout');
    }
    public function postCheckout(Request $r){
        dd($r->all());
    }
}
