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
        $NewDiscount = $r->all();
        Discount::create($NewDiscount);
        return redirect()->route('admin.discount.index')->withSuccess('Discount Added');

    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function getEditDiscount($discount_id)
    {
        $AllDiscount = Product::findOrFail($discount_id);
        return view('admin.discount.edit', compact('AllDiscount'));

    }


    public function update()
    {

    }


    public function destroy($id)
    {
        //
    }
}
