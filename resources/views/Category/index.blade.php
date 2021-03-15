@extends('layouts.app')
@section('content')
<div class="container">
<h3 class="title">Category List</h3>
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
  <a class="btn btn-info btn-sm" href="#">edit</a>
  <a class="btn btn-danger btn-sm" href="#">delete</a>
  </td>
  </tr>
  @endforeach
  </tbody>
</table>
</div>
@endsection