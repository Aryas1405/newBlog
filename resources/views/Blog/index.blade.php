@extends('layouts.app')
@section('content')
@php
$index=1;
@endphp
<div class="container">
<h3 class="title">Blog List  <a style="text-decoration:none;" href="{{route('blog.create')}}">+</a></h3>
<table class="table table-striped">
  <thead>
  <tr>
  <th>#</th>
  <th>Name</th>
  <th>Category</th>
  <th>Tags</th>
  <th>Description</th>
  <th>Action</th>
  </tr>
  </thead>
  <tbody>
  @foreach($blogs as $blog)
  <tr>
  <td>{{$index++}}</td>
  <td>{{$blog->name}}</td>
  <td>{{$blog->category->name}}</td>
  <td>
  @foreach($blog->tags as $tag)
  <span class="badge badge-warning">{{$tag->name}}</span>
  @endforeach
  </td>
  <td style="width:60%;">{{$blog->description}}</td>
  <td>
  <div class="row">
  <a class="btn btn-info btn-sm" href="{{route('blog.edit',$blog->id)}}">edit</a>&nbsp;
  <form action="{{route('blog.destroy',$blog->id)}}" method="post">
  @csrf()
  @method('delete')
  <button class="btn btn-danger btn-sm" type="submit">delete</button>
  </form>
  </div>
  </td>
  </tr>
  @endforeach
  </tbody>
</table>
</div>
@endsection