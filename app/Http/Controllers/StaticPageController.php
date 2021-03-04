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
    public function getShipping(){
        return view('static.shipping');
    }
    public function getConsigmentForm(){
        return view('static.consignment-form');
    }
    public function getWhoWeAre(){
        return view('static.who-we-are');
    }
    public function getPrivacy(){
        return view('static.privacy-policy');
    }
    public function getCareers(){
        return view('static.careers');
    }
}
