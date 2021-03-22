<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Tag;
use App\Category;
use Session;
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
        $request->validate([
            'name'=>'required|unique:blogs,name|min:3',
            'description'=>'required',
            'category'=>'required',
            'tags'=>'required'
        ]);
        $blog= new Blog;
        $blog->name=$request->name;
        $blog->description=$request->description;
        $blog->category_id=$request->category;
        $blog->save();
        $blog->tags()->sync($request->tags);
        session()->flash('success', 'Blog Created successfully!');
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
        
        $request->validate([
            'name'=>'required|unique:blogs,name,'.$id,
            'description'=>'required',
            'category'=>'required',
            'tags'=>'required',
        ]);
       $blog=Blog::find($id);
       $blog->name=$request->name;
       $blog->description=$request->description;
       $blog->save();
       $blog->tags()->sync($request->tags);
       session()->flash('warning', 'Blog Updated successfully!');
       return redirect()->route('blog.index');
    }

    public function destroy($id)
    {
        $Blog=Blog::find($id);
        $Blog->delete();
        session()->flash('danger', 'Blog Deleted successfully!');
        return redirect()->back();
    }
}
