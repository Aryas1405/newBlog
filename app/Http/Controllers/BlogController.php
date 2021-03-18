<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs=Blog::all();
        return view('Blog.index')
        ->withBlogs($blogs)
        ;
    }
    public function create()
    {
        $categories=Category::all();
        return view('Blog.create')->withCategories($categories);
    }
    public function store(Request $request)
    {
        $Blog= new Blog;
        $Blog->name=$request->name;
        $Blog->description=$request->description;
        $Blog->category_id=$request->category;
        $Blog->save();
        return redirect()->route('blog.index');
    }

    public function show(Blog $Blog)
    {
        //
    }

    public function edit($id)
    {
       $blog=Blog::find($id);
       return view('Blog.edit')->withBlog($blog);
    }
    public function update(Request $request,$id)
    {
       $blog=Blog::find($id);
       $blog->name=$request->name;
       $blog->description=$request->description;
       $blog->save();
       return redirect()->route('Blog.index');
    }

    public function destroy($id)
    {
        $Blog=Blog::find($id);
        $Blog->delete();
        return redirect()->back();
    }
}
