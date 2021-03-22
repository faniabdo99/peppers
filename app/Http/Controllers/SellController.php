<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;

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
            return back()->withErrors($Validator->errors()->all());
        }else{
            //Semd the mail to Mai

            //Return resulte
            return back()->withSuccess('Done');
        }
    }
}
