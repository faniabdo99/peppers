<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Validator;

class CategoryController extends Controller
{
    public function getCategory()
    {
        $AllCategories = Category::all();
        return view('admin.categories.all' ,compact('AllCategories'));
    }

    public function getCreateCategory()
    {
        $AllCategories = Category::all();
        return view('admin.categories.create', compact('AllCategories'));
    }
    public function postCreateCategory(Request $r)
    {
        $Rules = [
            'title' => 'required',
            'slug' => 'required',
            'type' => 'required',
            'gender' => 'required',
        ];
        $Validator = Validator::make($r->all(),$Rules);
        if($Validator->fails()){
            return back()->withErrors('Error');
        }
        else{

            $CategoryData = $r->all();
            Category::create($CategoryData);
            return redirect()->route('admin.categories.all')->withSuccess("Category Added Successfully");
            }

    }

    public function getEditCategory($id)
    {
        $AllCategories = Category::findOrFail($id);
        return view('admin.categories.edit', compact('AllCategories'));
    }
    public function postEditCategory(Request $r , $id)
    {
        $AllCategories = Category::findOrFail($id);
        $Rules = [
            'title' => 'required',
            'slug' => 'required',
            'type' => 'required',
            'gender' => 'required',
        ];

        $Validator = Validator::make($r->all(),$Rules);
        if($Validator->fails()){
            return back()->withErrors('Error');
        }
        else{

            $CategoryData = $r->all();
            $AllCategories->update($CategoryData);
            return redirect()->route('admin.categories.all')->withSuccess("Category Updated Successfully");
        }
    }
 public function deleteCategory($id)
    {
        //Get the product
        $Category = Category::findOrFail($id);
        //Delete
        $Category->delete();
        //Return with success
        return redirect()->route('admin.categories.all')->withSuccess("Category Deleted Successfully");
    }
}
