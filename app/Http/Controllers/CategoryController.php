<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
 
    public function index()
    {
        $categories=Category::orderBy('name','ASC')->get();
        return view('Category.index')
        ->withCategories($categories)
        ;
    }
    public function create()
    {
        return view('Category.create');
    }
    public function store(Request $request)
    {
        $category= new Category;
        $category->name=$request->name;
        $category->description=$request->description;
        $category->save();
        return redirect()->route('category.index');
    }

    public function show(Category $category)
    {
        //
    }

    public function edit($id)
    {
       $category=Category::find($id);
       return view('Category.edit')->withCategory($category);
    }
    public function update(Request $request,$id)
    {
       $category=Category::find($id);
       $category->name=$request->name;
       $category->description=$request->description;
       $category->save();
       return redirect()->route('category.index');
    }

    public function destroy($id)
    {
        $category=Category::find($id);
        $category->delete();
        return redirect()->back();
    }
}
