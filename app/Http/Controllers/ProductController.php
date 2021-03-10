<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller{
    public function getSingle(){
        return view('product.single');
    }
}
