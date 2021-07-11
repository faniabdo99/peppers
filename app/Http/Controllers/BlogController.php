<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Product;
use Validator;
use Image as ImageLib;
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
            'active' => 'required',
            'image' => 'required',
            'allow_comments' => 'required',
        ];
        $Validator = Validator::make($r->all(),$Rules);
        if($Validator->fails()){
            return back()->withErrors('Error');
        }
        else{
            $BlogData = $r->all();
            $BlogData['slug'] = strtolower(str_replace(' ' , '-' , $r->slug));
            $BlogData['user_id'] = auth()->user()->id;
            //Upload Images to the server
            if($r->has('image')){
                $img = ImageLib::make($r->image);
                // backup status
                $img->backup();
                // Cover Low Res
                $img->fit(600, 600);
                $img->save('storage/app/public/images/blogs/'.$BlogData['slug'].'.'.$r->image->getClientOriginalExtension());
                $BlogData['image'] = $BlogData['slug'].'.'.$r->image->getClientOriginalExtension();
            }
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
            'active' => 'required',
            'image' => 'required',
            'allow_comments' => 'required',
        ];

        $Validator = Validator::make($r->all(),$Rules);
        if($Validator->fails()){
            return back()->withInput()->withErrors($Validator->errors()->all());

        }
        else{
            $BlogData = $r->all();
            $BlogData['slug'] = strtolower(str_replace(' ' , '-' , $r->slug));
            $BlogData['user_id'] = auth()->user()->id;
            //Upload Images to the server
            if($r->has('image')){
                $img = ImageLib::make($r->image);
                // backup status
                $img->backup();
                // Cover Low Res
                $img->fit(600, 600);
                $img->save('storage/app/public/images/blogs/'.$BlogData['slug'].'.'.$r->image->getClientOriginalExtension());
                $BlogData['image'] = $BlogData['slug'].'.'.$r->image->getClientOriginalExtension();
            }
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
