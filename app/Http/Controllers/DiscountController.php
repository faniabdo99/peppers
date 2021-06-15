<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discount;
use App\Models\Product;


class DiscountController extends Controller
{

    public function getDiscount()
    {
        $AllDiscount = Discount::all();
        return view('admin.discount.index' ,compact('AllDiscount'));
    }


    public function getCreateDiscount()
    {
        return view('admin.discount.create');
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


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
