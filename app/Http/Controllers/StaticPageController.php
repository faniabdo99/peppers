<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Imports\BrandsImport;
use App\Imports\CategoriesImport;
use Maatwebsite\Excel\Facades\Excel;
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
    public function getHowItWorks(){
        return view('static.how-it-works');
    }
    public function getPaymentOptions(){
        return view('static.payment-options');
    }
    public function getImportBrands(){
        Excel::import(new BrandsImport, 'brands.xlsx');
        dd("Import Completed");
    }
    public function getImportCategories(){
        Excel::import(new CategoriesImport, 'categories.xlsx');   
        dd('categories imported');
    }
}