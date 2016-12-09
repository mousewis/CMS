@extends('layouts.app')
@section('content')
<div class="container">
<h2>Create <span class='muted'>Options</span></h2>
<hr>

@include('options._form', ['action'=> 'store'])

<p><a href="{{url('options')}}">Back</a></p>
</div>
@endsection