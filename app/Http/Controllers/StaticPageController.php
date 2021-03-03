<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class StaticPageController extends Controller{
    public function getAutheticity(){
        return view('static.authenticity');
    }
    public function getFaqs(){
        return view('static.faqs');
    }
    public function getReturns(){
        return view('static.returns');
    }
}
