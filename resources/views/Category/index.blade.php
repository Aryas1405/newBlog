@extends('layouts.app')
@section('content')
<div class="container">
<h3 class="title">Category List  <a style="text-decoration:none;" href="{{route('category.create')}}">+</a></h3>
<table class="table table-striped">
  <thead>
  <tr>
  <th>#</th>
  <th>Name</th>
  <th>Description</th>
  <th>Action</th>
  </tr>
  </thead>
  <tbody>
  @foreach($categories as $category)
  <tr>
  <td>{{$category->id}}</td>
  <td>{{$category->name}}</td>
  <td>{{$category->description}}</td>
  <td>
  <a class="btn btn-info btn-sm" href="{{route('category.edit',$category->id)}}">edit</a>
  
  <form action="{{route('category.delete',$category->id)}}" method="post">
  @csrf()
  @method('delete')
  <button class="btn btn-danger btn-sm" type="submit">delete</button>
  </form>
  </td>
  </tr>
  @endforeach
  </tbody>
</table>
</div>
@endsection