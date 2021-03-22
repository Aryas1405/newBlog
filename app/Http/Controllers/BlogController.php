<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Tag;
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
        $tags=Tag::all();
        return view('Blog.create',compact('tags','categories'));
    }
    public function store(Request $request)
    {
        $blog= new Blog;
        $blog->name=$request->name;
        $blog->description=$request->description;
        $blog->category_id=$request->category;
        $blog->save();
        $blog->tags()->sync($request->tags);
        return redirect()->route('blog.index');
    }

    public function show(Blog $Blog)
    {
        //
    }

    public function edit($id)
    {
       $blog=Blog::find($id);
       $categories=Category::all();
       $tags=Tag::all();
       return view('Blog.edit',compact('blog','tags','categories'));
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
