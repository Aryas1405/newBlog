@extends('layouts.app')
@section('content')

<div class="container">
<h3 class="title">Blog Create</h3>
<form action="{{route('blog.store')}}" method="post">
@csrf()
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" name="name"  placeholder="name">
  </div>
  @error('name')
    <span class="text-danger">{{$message}}</span>
@enderror

  <div class="form-group">
    <label for="exampleInputEmail1">Category</label>
    <select name="category" class="js-example-basic-single form-control" >
    <option value="">--select category--</option>
    @foreach($categories as $category)
    <option value="{{$category->id}}">{{$category->name}}</option>
    @endforeach
    </select>
    @error('category')
    <span class="text-danger">{{$message}}</span>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Tags</label>
    <select name="tags[]" class="js-example-basic-multiple form-control" multiple >
    <option value="">--select tag--</option>
    @foreach($tags as $tag)
    <option value="{{$tag->id}}">{{$tag->name}}</option>
    @endforeach
    </select>
    @error('tags')
    <span class="text-danger">{{$message}}</span>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Description</label>
    <textarea class="form-control" name="description" placeholder="description"></textarea>
    @error('description')
    <span class="text-danger">{{$message}}</span>
    @enderror
  </div>
 
  <button type="submit" class="btn btn-primary">Save</button>
</form>
</div>


@endsection