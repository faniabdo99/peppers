<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Sheets;
use Validator;
class NewsletterController extends Controller{
    public function postNewsletter(Request $r){
        //Validate the request
        $Rules = [
            'email' => 'required|email'
        ];
        $Validator = Validator::make($r->all(), $Rules);
        if($Validator->fails()){
            return response($Validator->errors()->first() , 400);
        }else{
            //Upload to the datasheet
            $TheMessageSheetData = $r->all();
            Sheets::spreadsheet(env('POST_SPREADSHEET_ID'))->sheet('Newsletter')->append([$TheMessageSheetData]);
            return response('Your are now signed up to our newsletter' , 200);
        }
    }
}
