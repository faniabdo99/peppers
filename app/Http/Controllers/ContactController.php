<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;
use Sheets;
use Validator;
use App\Mail\ContactUsMail;
class ContactController extends Controller{
    public function getContact(){
        return view('static.contact');
    }
    public function postContact(Request $r){
        //Validate the request
        $Rules = [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ];
        $Validator = Validator::make($r->all() , $Rules);
        if($Validator->fails()){
            return back()->withErrors($Validator->errors()->all());
        }else{
            $EmailData = $r->except('_token');
            $EmailData['created_at'] = date('Y-m-d');
            //Upload to google sheets
            Sheets::spreadsheet(env('POST_SPREADSHEET_ID'))->sheet('ContactUs')->append([$EmailData]);
            //Send the mail
            Mail::to('faniabdo99@gmail.com')->send(new ContactUsMail($EmailData));
            return back()->withSuccess('Your email has been sent, thank you');
        }
    }
}
