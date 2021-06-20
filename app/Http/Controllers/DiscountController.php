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
        return view('admin.discount.index' ,compact('AllDiscount'));
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

            $CategoryData = $r->all();
            Discount::create($CategoryData);
            return redirect()->route('admin.discount.index')->withSuccess("Discount Added Successfully");
            }

    }

    public function getEditDiscount($id)
    {
        $AllDiscount = Discount::findOrFail($id);
        return view('admin.discount.edit', compact('AllDiscount'));
    }
    public function postEditDiscount(Request $r , $id)
    {
        $Rules = [
            'title' => 'required',
            'value' => 'required',
            'type' => 'required',
            'expire' => 'required',
        ];
        $AllDiscount = Discount::findOrFail($id);

        $Validator = Validator::make($r->all(),$Rules);
        if($Validator->fails()){
            return back()->withErrors('Error');
        }
        else{

            $CategoryData = $r->all();
            $AllDiscount->update($CategoryData);
            return redirect()->route('admin.discount.index')->withSuccess("Discount Updated Successfully");
        }
    }
    public function delete($id)
    {
        //
    }
}
