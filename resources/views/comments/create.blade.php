@extends('layouts.app')
@section('content')
<div class="container">
<h2>Create <span class='muted'>Comments</span></h2>
<hr>

@include('comments._form', ['action'=> 'store'])

<p><a href="{{url('comments')}}">Back</a></p>
</div>
@endsection