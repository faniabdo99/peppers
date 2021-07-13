<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use Mail;
use Sheets;
//Include the mailables
use App\Mail\SellMail;
class SellController extends Controller{
    public function getSellWithUs(){
        return view('sell.how-to-sell-with-us');
    }
    public function postSellWithUs(Request $r){
        //Validate the request
        $Rules = [
            'title' => 'required',
            'gender' => 'required',
            'category' => 'required',
            'brand' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'toc' => 'required',
            'images' => 'required|max:5|min:1'
        ];
        $Validator = Validator::make($r->all(), $Rules);
        if($Validator->fails()){
            return back()->withErrors($Validator->errors()->all())->withInput();
        }else{
            //Validate the images
            $EmailData = $r->except('images' , '_token');
            $EmailData['images'] = [];
            if($r->has('images')){
                $AllowedExt = ['jpg','png','jpeg','bmb','heic','gif'];
                if(count($r->images) > 5){
                    return back()->withErrors('You can upload 5 images only')->withInput();
                }
                foreach ($r->images as $key => $file) {
                    // Check the file type and size
                    if(!in_array($file->getClientOriginalExtension() , $AllowedExt)){
                      return back()->withErrors('Some Files Are Not Allowed!')->withInput();
                    }
                    if($file->getSize() > 3000000){
                      return back()->withErrors('Maximum Allowed File Size is 3MB Per File!')->withInput();
                    }
                    //Uplaod the image to server
                    $ImageName =strtolower(str_replace(' ' , '_' , $r->title.$key)).'.'.$file->getClientOriginalExtension();
                    $ImagePath = url('storage/app/sell/').'/'.strtolower(str_replace(' ' , '_' , $r->title.$key)).'.'.$file->getClientOriginalExtension();
                    $file->storeAs('sell' , $ImageName);
                    array_push($EmailData['images'] ,$ImagePath);
                }
            }
            //Get the last id from Google Sheets
            $CurrentValues = Sheets::spreadsheet(env('POST_SPREADSHEET_ID'))->sheet('SellToUs')->all();
            //Upload to Google Sheets
            $EmailData['id'] = 'SU-'.count($CurrentValues);
            $EmailData['date'] = date('Y-m-d');
            $GSheetData = $EmailData;
            $GSheetData['images'] = implode("-" , $EmailData['images']);
            Sheets::spreadsheet(env('POST_SPREADSHEET_ID'))->sheet('SellToUs')->append([$GSheetData]);
            //Send the email
            Mail::to('info@peppersluxury.com')->send(new SellMail($EmailData));
            // WhatsApp Noto
            $WhatsappMessage = "New Sell to us Request:
Hello There, You have new \"Sell to us\" Request.
=====================================
Name:".$r->name."
Phone Number:".$r->phone."
Request ID:".$GSheetData['id']."
=====================================
You can always check your Sell to us requests from Google Sheets, Here is the link: https://shorturl.at/gDNPX";
                        getAdminUserModel()->notify(new OrderCreated('+201151411867' , $WhatsappMessage));
            return back()->withSuccess('Your item has been recived, Thanke you.');
        }
    }
    public function getPersonalShopper(){
        return view('sell.personal-shopper');
    }
    public function postPersonalShopper(Request $r){
        //Validate the request
        $Rules = [
            'link' => 'required|url',
            'name' => 'required',
            'phone' => 'required'
        ];
        $Validator = Validator::make($r->all() , $Rules);
        if($Validator->fails()){
            return back()->withErrors($Validator->errors()->all());
        }else{
            //Get latest items in google sheet
            $CurrentValues = Sheets::spreadsheet(env('POST_SPREADSHEET_ID'))->sheet('PersonalShopper')->all();
            //Go to Google Sheets
            $GSheetData = $r->except('_token');
            $GSheetData['id'] = 'PS-'.count($CurrentValues);
            $GSheetData['date'] =  date('Y-m-d');
            Sheets::spreadsheet(env('POST_SPREADSHEET_ID'))->sheet('PersonalShopper')->append([$GSheetData]);
            //Send the email
            // Mail::to('info@peppersluxury.com')->send(new SellMail($EmailData));
            // WhatsApp Noto
            $WhatsappMessage = "New Personal Shopper Request:
Hello There, You have new \"Personal Shopper\" Request.
=====================================
Name:".$r->name."
Phone Number:".$r->phone."
Product Link:".$r->link."
Request ID:".$GSheetData['id']."
=====================================
You can always check your Personal shopper requests from Google Sheets, Here is the link: https://shorturl.at/gDNPX";
            getAdminUserModel()->notify(new OrderCreated('+201151411867' , $WhatsappMessage));
            return back()->withSuccess('Thank you, Our team will get in touch with you');
        }
    }
}
