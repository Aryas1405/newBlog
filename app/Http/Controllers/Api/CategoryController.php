<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Str;
use App\Traits\ResponseTrait;

class CategoryController extends Controller
{
    use ResponseTrait;
    public function index()
    {
        $categories=Category::all();
        $response=$this->response('Category List',$categories,'1000');
        return $response;
    }
    public function create(Request $request)
    {
        $category=new Category;
        if($request->name==null || $request->description==null)
        return $this->response('Name or Description Missing',null,'1002');
        elseif(Category::where('name',$request->name)->first())
        return $this->response('Name Already exist',null,'1002');
        $str=strtolower($request->name);
        $slug = preg_replace('/\s+/', '-', $str);
        $random = Str::random(5);
        $category->slug=$slug.$random;
        $category->name=$request->name;
        $category->description=$request->description;
        $category->save();  
        $response=$this->response('Category Saved',$category,'1000');
        return $response;


    }
    public function edit(Request $request)
    {
        if($request->name==null || $request->description==null)
        return $this->response('Name or Description Missing',null,'1002');
        $category=Category::where('slug',$request->slug)->first();
        if(!$category)
        return $this->response('category not found',null,'1002');
        $str=strtolower($request->name);
        $slug = preg_replace('/\s+/', '-', $str);
        $random = Str::random(5);
        $category->slug=$slug.$random;
        $category->name=$request->name;
        $category->description=$request->description;
        $category->save();
        return $this->response('category updated',$category,'1000');
    }
    public function delete(Request $request)
    {
        $category=Category::where('slug',$request->slug)->first();
        if(!$category)
        return $this->response('category not found',null,'1002');
        $category->delete();
        return $this->response('category deleted',null,'1000'); 
    }


}