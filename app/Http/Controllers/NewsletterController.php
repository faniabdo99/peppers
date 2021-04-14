<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Sheets;
use Validator;
use Mail;
use App\Mail\NewsletterNotification;
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
            $TheMessageSheetData['created_at'] = date('Y-m-d');
            //Save the user in the google sheets
            Sheets::spreadsheet(env('POST_SPREADSHEET_ID'))->sheet('Newsletter')->append([$TheMessageSheetData]);
            //Send confirmation email
            Mail::to($r->email)->send(new NewsletterNotification);
            return response('Your have been signed up to our newsletter' , 200);
        }
    }
}
