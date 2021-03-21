<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SellController extends Controller
{
    public function getSellWithUs(){
        return view('sell.how-to-sell-with-us');
    }
}
