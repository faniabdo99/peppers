<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Models\Product;
use Validator;


class CouponController extends Controller
{

    public function getCoupon()
    {
        $AllCoupons = Coupon::all();
        return view('admin.coupons.all' ,compact('AllCoupons'));
    }

    public function getCreateCoupon()
    {
        $AllCoupons = Coupon::all();
        return view('admin.coupons.create');
    }
    public function postCreateCoupon(Request $r)
    {

        $Rules = [
            'title' => 'required',
        ];
        $Validator = Validator::make($r->all(),$Rules);
        if($Validator->fails()){
            return back()->withErrors('Error');
        }
        else{

            $CouponData = $r->all();
            Coupon::create($CouponData);
            return redirect()->route('admin.coupons.all')->withSuccess("Coupon Added Successfully");
            }

    }

    public function getEditCoupon($id)
    {
        $AllCoupons = Coupon::findOrFail($id);
        return view('admin.coupons.edit', compact('AllCoupons'));
    }
    public function postEditCoupon(Request $r , $id)
    {
        $AllCoupons = Coupon::findOrFail($id);
        $Rules = [
            'title' => 'required',
        ];

        $Validator = Validator::make($r->all(),$Rules);
        if($Validator->fails()){
            return back()->withErrors('Error');
        }
        else{

            $CategoryData = $r->all();
            $AllCoupons->update($CategoryData);
            return redirect()->route('admin.coupons.all')->withSuccess("Coupon Updated Successfully");
        }
    }
 public function deleteCoupon($id)
    {
        //Get the product
        $Coupon = Coupon::findOrFail($id);
        //Delete
        $Coupon->delete();
        //Return with success
        return redirect()->route('admin.coupons.all')->withSuccess("Coupon Deleted Successfully");
    }
}
