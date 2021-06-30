<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
class AdminController extends Controller
{
    public function getIndex(){
        $LatestOrders = Order::latest()->limit(10)->get();
        return view('admin.index' , compact('LatestOrders'));
    }
}
