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
            'phone' => 'required|integer',
            'toc' => 'required',
            'images' => 'required|max:5'
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
                    $ImageName = strtolower(str_replace(' ' , '_' , $r->title.$key)).'.'.$file->getClientOriginalExtension();
                    $file->storeAs('sell' , $ImageName);
                    array_push($EmailData['images'] ,$ImageName);
                }
                //Validate the size and ext
            }
            //Upload to Google Sheets
            $GSheetData = $EmailData;
            $GSheetData['images'] = implode("-" , $EmailData['images']);
            Sheets::spreadsheet(env('POST_SPREADSHEET_ID'))->sheet('SellToUs')->append([$GSheetData]);
            //Send the email
            Mail::to('faniabdo99@gmail.com')->send(new SellMail($EmailData));
            return back()->withSuccess('Succesfully');
        }
    }
}
