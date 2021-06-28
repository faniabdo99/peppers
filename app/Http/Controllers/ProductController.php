<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use Validator;


class ProductController extends Controller
{

    public function getProduct()
    {
        $AllProducts = Product::all();
        return view('admin.products.all' ,compact('AllProducts'));
    }

    public function getCreateProduct()
    {
        $AllProducts = Product::all();
        return view('admin.products.create',compact('AllProducts'));
    }
    public function postCreateProduct(Request $r)
    {
        $Rules = [
            'title' => 'required',
            'slug' => 'required|unique:products',
            'category_id' => 'required|integer',
            'status' => 'required',
            'description' => 'required',
            'content' => 'required',
            'color' => 'required',
            'for_gender' => 'required',
            'size' => 'required',
            'condition' => 'required',
            'height' => 'required',
            'width' => 'required',
            'depth' => 'required',
            'brand_id' => 'required|integer',
            'sku' => 'required|unique:products',
            'buy_price' => 'required',
            'price' => 'required',
            'qty' => 'required',
            'store_location' => 'required',
            'image' => 'required|image'
        ];
        $Validator = Validator::make($r->all(),$Rules);
        if($Validator->fails()){
            return back()->withErrors('Error');
        }
        else{

            $ProductData = $r->all();
            Product::create($ProductData);
            return redirect()->route('admin.products.all')->withSuccess("Product Added Successfully");
            }

    }

    public function getEditProduct($id)
    {
        $AllProducts = Product::findOrFail($id);
        return view('admin.products.edit', compact('AllProducts'));
    }
    public function postEditProduct(Request $r , $id)
    {
        $AllProducts = Product::findOrFail($id);
        $Rules = [
            'title' => 'required',
            'slug' => 'required|unique:products',
            'category_id' => 'required|integer',
            'status' => 'required',
            'description' => 'required',
            'content' => 'required',
            'color' => 'required',
            'for_gender' => 'required',
            'size' => 'required',
            'condition' => 'required',
            'height' => 'required',
            'width' => 'required',
            'depth' => 'required',
            'brand_id' => 'required|integer',
            'sku' => 'required|unique:products',
            'buy_price' => 'required',
            'price' => 'required',
            'qty' => 'required',
            'store_location' => 'required',
            'image' => 'required|image'
        ];

        $Validator = Validator::make($r->all(),$Rules);
        if($Validator->fails()){
            return back()->withErrors('Error');
        }
        else{

            $CategoryData = $r->all();
            $AllProducts->update($CategoryData);
            return redirect()->route('admin.products.all')->withSuccess("Product Updated Successfully");
        }
    }
 public function deleteProduct($id)
    {
        //Get the product
        $Product = Product::findOrFail($id);
        //Delete
        $Product->delete();
        //Return with success
        return redirect()->route('admin.products.all')->withSuccess("Product Deleted Successfully");
    }
}
