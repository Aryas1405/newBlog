@extends('layouts.app')
@section('content')
@php
$index=1;
@endphp
<div class="container">
<h3 class="title">Blog List @permission('blog-create') <a style="text-decoration:none;" href="{{route('blog.create')}}">+</a> @endpermission</h3>
<div class="row">
<div class="col-md-2" style=""></div>
<div class="col-md-2">{{$blogs->links()}}</div>
<div class="col-md-4"></div>
<div class="col-md-4">
<form action="">
<div class="row">
<input class="col-md-6 form-control" style="width" name="searchB" value="{{$name}}" type="text" placeholder="search blog">
<button class=" btn btn-info btn-sm">GO</button>
</div>
</form>
</div>
</div>
<table class="table table-striped">
  <thead>
  <tr>
  <th>#</th>
  <th>Name</th>
  <th>Category</th>
  <th>Tags</th>
  <th>Action</th>
  </tr>
  </thead>
  <tbody>
  @foreach($blogs as $blog)
  <tr>
  <td>{{$index++}}</td>
  <td>{{$blog->name}}</td>
  <td>@if($blog->category){{$blog->category->name}}@endif</td>
  <td>
  @foreach($blog->tags as $tag)
  <span class="badge badge-warning">{{$tag->name}}</span>
  @endforeach
  </td>

  <td>
  <div class="row">
  @if(Auth::user())
  @permission('blog-edit')
  <a class="btn btn-info btn-sm" href="{{route('blog.edit',$blog->id)}}">edit</a>&nbsp;
  @endpermission
  <a class="btn btn-info btn-sm" href="{{route('blog.show',$blog)}}">show</a>&nbsp;
  @permission('blog-delete')
    <form action="{{route('blog.destroy',$blog->id)}}" method="post">
    @csrf()
    @method('delete')
    <button class="btn btn-danger btn-sm" type="submit">delete</button>
    </form>
  @endpermission
  @endif
  </div>
  </td>
  </tr>
  @endforeach
  </tbody>
</table>
</div>
@endsection