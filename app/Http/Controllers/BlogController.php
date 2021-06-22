<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Product;
use Validator;


class BlogController extends Controller
{

    public function getBlog()
    {
        $AllBlogs = Blog::all();
        return view('admin.blog.all' ,compact('AllBlogs'));
    }

    public function getCreateBlog()
    {
        $AllBlogs = Blog::all();
        return view('admin.blog.create' , compact('AllBlogs'));
    }
    public function postCreateBlog(Request $r)
    {
        $Rules = [
            'title' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'content' => 'required',
            'category' => 'required',
            'keywords' => 'required',
            // 'user_id' => 'required',
        ];
        $Validator = Validator::make($r->all(),$Rules);

        if($Validator->fails()){
            return back()->withErrors('Error');
        }
        else{
            $BlogData = $r->all();

            $BlogData['slug'] = strtolower(str_replace(' ' , '-' , $r->slug));
            // $BlogData['user_id'] = auth()->user()->id;
            Blog::create($BlogData);
            return redirect()->route('admin.blog.all')->withSuccess("Blog Added Successfully");
            }

    }

    public function getEditBlog($id)
    {
        $AllBlogs = Blog::findOrFail($id);
        return view('admin.blog.edit', compact('AllBlogs'));
    }
    public function postEditBlog(Request $r , $id)
    {
        $AllBlogs = Blog::findOrFail($id);
        $Rules = [
            'title' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'content' => 'required',
            'category' => 'required',
            'keywords' => 'required',
            // 'user_id' => 'required',
        ];

        $Validator = Validator::make($r->all(),$Rules);
        if($Validator->fails()){
            return back()->withErrors('Error');
        }
        else{

            $BlogData = $r->all();
            $BlogData['slug'] = strtolower(str_replace(' ' , '-' , $r->slug));
            // $BlogData['user_id'] = auth()->user()->id;
            $AllBlogs->update($BlogData);
            return redirect()->route('admin.blog.all')->withSuccess("Blog Updated Successfully");
        }
    }
 public function deleteBlog($id)
    {
        //Get the product
        $Blog = Blog::findOrFail($id);
        //Delete
        $Blog->delete();
        //Return with success
        return redirect()->route('admin.blog.all')->withSuccess("Blog Deleted Successfully");
    }
}
