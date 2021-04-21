@extends('layouts.app')
@section('content')
@php
$index=1;
@endphp
<div class="container">
<h3 class="title">Tag List  <a style="text-decoration:none;" href="{{route('tag.create')}}">+</a></h3>
<form action="" method="get">
<input type="text" placeholder="search tag" name="searchT" value="" style=" margin-left:800px;margin-bottom:8px;" >
<button type="submit" class="fas fa-search">GO</button> 
</form>
{{$tags->links()}}
<table class="table table-striped">
  <thead>
  <tr>
  <th>#</th>
  <th>Name</th>
  <th>Blogs</th>
  <th>Action</th>
  </tr>
  </thead>
  <tbody>
  @foreach($tags as $tag)
  <tr>
  <td>{{$index++}}</td>
  <td>{{$tag->name}}</td>
  <td>
  @foreach($tag->blogs as $blog)
  <span class="badge badge-warning">{{$blog->name}}</span>
  @endforeach
  </td>
  <td>
  <div class="row">
  <a class="btn btn-info btn-sm" href="{{route('tag.slug_edit',$tag->slug)}}">edit</a>&nbsp;
  <form action="{{route('tag.destroy',$tag->id)}}" method="post">
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