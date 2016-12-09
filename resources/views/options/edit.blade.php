@extends('layouts.app')
@section('content')
<div class="container">
<h2>Edit <span class='muted'>Options</span></h2>
<hr>
@include('options._form', ['options' => $options, 'action'=> 'update'])
<p>
	<a href="{{url('options/show/'.$options->opt_id)}}"> View</a> |
	<a href="{{url('options')}}">Back</a>
</p>
</div>
@endsection