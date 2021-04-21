<?php

namespace App\Http\Controllers;
use DB;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tags=Tag::paginate(10);
        return view('Tag.index')->withTags($tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $str=strtolower($request->name);
        $slug = preg_replace('/\s+/', '-', $str); 
        $random = Str::random(4);

        $tag=new Tag;
        $tag->name = $request->name;
        $tag->slug=$slug.$random;
        $tag->save();
        return redirect()->route('tag.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edittag($slug)
    {
        $tag=Tag::where('slug',$slug)->first();
        return view('Tag.edit')->withTag($tag);
    }

    public function update(Request $request, Tag $tag)
    {
        $str=strtolower($request->name);
        $slug = preg_replace('/\s+/', '-', $str); 
        $random = Str::random(4);

        $tag->name = $request->name;
        $tag->slug=$slug.$random;
        $tag->save();
        return redirect()->route('tag.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tag.index');
    }
}
