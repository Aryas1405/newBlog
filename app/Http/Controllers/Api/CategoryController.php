<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Str;
use App\User;
use DB;
use App\Traits\ResponseTrait;

class CategoryController extends Controller
{
    use ResponseTrait;

    public function keycheck()
    {

    }
    public function check_connection($connection_id,$name,$email,$password)
    {

        $valid=DB::table('connection_request')->where('connection_id',$connection_id)->first();
        if($valid)
        {
            $user =new User;
            $user->name=$name;
            $user->email=$email;
            $user->password=$password;
            $user->save();
            $a_code=Str::random(6);
            DB::table('connection_request')->where('connection_id',$connection_id)
            ->update(['user_id'=>$user->id,'auth_code'=>$a_code]);
            $user->auth_code=$a_code;
            return $user;
        }
        else
        return false;

    }
    public function check_user($connection_id,$auth_code)
    {
        $valid=DB::table('connection_request')->where('connection_id',$connection_id)->where('auth_code',$auth_code)->first();
        if($valid)
        {
            $a_code=Str::random(6);
            DB::table('connection_request')->where('connection_id',$connection_id)
            ->update(['auth_code'=>$a_code]);
            $connection= DB::table('connection_request')->where('connection_id',$connection_id)->first();
            return $connection;
        }
        else
        return false;
    }
    public function index(Request $request)
    {
        // dd($request->all());
       
        if($request->key==123456)
        {
            $c_id=Str::random(6);
            DB::table('connection_request')->insert(['connection_id'=>$c_id]);
            $response=$this->response('Connection_id',$c_id,'1000');
        }
        else
        {
            $exist_user=User::where('email',$request->email)->first();
            if($exist_user)
            $valid=$this->check_user($request->connection_id,$request->auth_code);
            else
            $valid=$this->check_connection($request->connection_id,$request->name,$request->email,$request->password);
            if($valid)
            {
            $categories=Category::all();
            $data=[$valid,$categories];
            $response=$this->response('Category List',$data,'1000');
            }
            else
            $response=$this->response('Invalid User ',null,'1000');
        }
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