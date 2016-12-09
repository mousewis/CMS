@extends('layouts.app')
@section('content')
<div class="container">
<h2>Edit <span class='muted'>Comments</span></h2>
<hr>
@include('comments._form', ['comments' => $comments, 'action'=> 'update'])
<p>
	<a href="{{url('comments/show/'.$comments->comm_id)}}"> View</a> |
	<a href="{{url('comments')}}">Back</a>
</p>
</div>
@endsection