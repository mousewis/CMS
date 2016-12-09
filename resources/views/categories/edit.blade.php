@extends('layouts.app')
@section('content')
<div class="container">
<h2>Edit <span class='muted'>Categories</span></h2>
<hr>
@include('categories._form', ['categories' => $categories, 'action'=> 'update'])
<p>
	<a href="{{url('categories/show/'.$categories->cate_id)}}"> View</a> |
	<a href="{{url('categories')}}">Back</a>
</p>
</div>
@endsection