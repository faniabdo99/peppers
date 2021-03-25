<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorsController extends Controller
{
    public function get404Page(){
        return view('user.error.404page');
    }
    public function get403Page(){
        return view('user.error.403page');
    }
    public function get500Page(){
        return view('user.error.500page');
    }
}
