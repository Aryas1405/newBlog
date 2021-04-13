@extends('layouts.app')
@section('content')
@php
$perPage=$categories->perPage();
$currentPage=$categories->currentPage()-1;
$index=$perPage*$currentPage+1;
@endphp
<div class="row">
<div class="col-md-8">
<h3 class="title">Category List  <a style="text-decoration:none;" href="#" onclick="create()">+</a></h3>
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
  <a class="btn btn-info btn-sm" href="#" onclick="edit({{$category->id}})">edit</a>&nbsp;
  <a class="btn btn-danger btn-sm" href="#" onclick="deleteit({{$category->id}})">delete</a>&nbsp;

  </div>
  </td>
  </tr>
  @endforeach
  </tbody>
</table>
{{ $categories->links() }}

</div>
<div class="col-md-4" >
<br>
<br>
<br>
<br>
<div id="data">
</div>
</div>
</div>
@endsection 
<script>
function create()
{
  $.ajax({
    type:'GET',
    url:'/category/create/',
    success:function(data) {
      $("#data").html(data);
    }
  });
}
function edit(id)
{
  $.ajax({
    type:'GET',
    url:'/category/edit/'+id,
    success:function(data) {
      $("#data").html(data);
    }
  });
}
function deleteit(id)
{
  $.ajax({
    type:'GET',
    url:'/category/delete/',
    data:{cat_id:id},
  });
  location.reload();
}
</script>

