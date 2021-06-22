<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Discount;
use App\Models\Product;
use Validator;


class DiscountController extends Controller
{

    public function getDiscount()
    {
        $AllDiscount = Discount::all();
        return view('admin.discount.all' ,compact('AllDiscount'));
    }

    public function getCreateDiscount()
    {
        $AllDiscount = Discount::all();
        return view('admin.discount.create');
    }
    public function postCreateDiscount(Request $r)
    {
        $Rules = [
            'title' => 'required',
            'value' => 'required',
            'type' => 'required',
            'expire' => 'required',
        ];
        $Validator = Validator::make($r->all(),$Rules);
        if($Validator->fails()){
            return back()->withErrors('Error');
        }
        else{

            $DiscountData = $r->all();
            Discount::create($DiscountData);
            return redirect()->route('admin.discount.all')->withSuccess("Discount Added Successfully");
            }

    }

    public function getEditDiscount($id)
    {
        $AllDiscount = Discount::findOrFail($id);
        return view('admin.discount.edit', compact('AllDiscount'));
    }
    public function postEditDiscount(Request $r , $id)
    {
        $AllDiscount = Discount::findOrFail($id);
        $Rules = [
            'title' => 'required',
            'value' => 'required',
            'type' => 'required',
            'expire' => 'required',
        ];

        $Validator = Validator::make($r->all(),$Rules);
        if($Validator->fails()){
            return back()->withErrors('Error');
        }
        else{

            $CategoryData = $r->all();
            $AllDiscount->update($CategoryData);
            return redirect()->route('admin.discount.all')->withSuccess("Discount Updated Successfully");
        }
    }
 public function deleteDiscount($id)
    {
        //Get the product
        $Discount = Discount::findOrFail($id);
        //Delete
        $Discount->delete();
        //Return with success
        return redirect()->route('admin.discount.all')->withSuccess("Discount Deleted Successfully");
    }
}
