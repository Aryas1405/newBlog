@extends('layouts.app')
@section('content')
@php
$index=1;
@endphp
<div class="container">
<h3 class="title">Tag List  <a style="text-decoration:none;" href="{{route('tag.create')}}">+</a></h3>
<table class="table table-striped">
  <thead>
  <tr>
  <th>#</th>
  <th>Name</th>
  <th>Action</th>
  </tr>
  </thead>
  <tbody>
  @foreach($tags as $tag)
  <tr>
  <td>{{$index++}}</td>
  <td>{{$tag->name}}</td>
  <td>
  <div class="row">
  <a class="btn btn-info btn-sm" href="{{route('tag.edit',$tag)}}">edit</a>&nbsp;
  <form action="{{route('tag.destroy',$tag)}}" method="post">
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