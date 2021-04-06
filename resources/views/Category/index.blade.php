@extends('layouts.app')
@section('content')
@php
$perPage=$categories->perPage();
$currentPage=$categories->currentPage()-1;
$index=$perPage*$currentPage+1;
@endphp
<div class="container">
<h3 class="title">Category List  <a style="text-decoration:none;" href="{{route('category.create')}}">+</a></h3>
<form action="" method="get">
<div class="row">
<div class="col-md-7"></div>
  <div class="col-md-2">
    <input type="text" placeholder="search name" value="{{$name}}"name="searchC" value="" style="margin-bottom:8px;" >
  </div>
  <div class="col-md-2">
    <input type="text" placeholder="search description" value="{{$description}}"name="searchD" value="" style="margin-bottom:8px;" >
  </div>
  <div class="col-md-1">
    <button type="submit" class="btn btn-info btn-sm">GO</button> 
  </div>
</div>
</form>
<table class="table table-striped">
  <thead>
  <tr>
  <th>#</th>
  <th>Name</th>
  <th>Blog</th>
  <th>Description</th>
  <th>Action</th>
  </tr>
  </thead>
  <tbody>
  @foreach($categories as $category)
  <tr>
  <td>{{$index++}}</td>
  <td>{{$category->name}}</td>
  <td style="width:30%;">
  @foreach($category->blogs as $blog)
  <span class="badge badge-info">{{$blog->name}}</span>
  @endforeach
  </td>
  <td style="width:30%;">{{$category->description}}</td>
  <td>
  <div class="row">
  @if($category->deleted_at)
  <a class="btn btn-warning btn-sm"href="{{route('category.restore',$category->id)}}">restore</a>
  @endif
  <a class="btn btn-info btn-sm" href="{{route('category.edit',$category->id)}}">edit</a>&nbsp;
  <form action="{{route('category.delete',$category->id)}}" method="post">
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
{{ $categories->links() }}

</div>
@endsection 