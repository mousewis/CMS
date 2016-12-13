@extends('layouts.app')
@section('content')
<div class="col-sm-12">
<h2>Create <span class='muted'>Users</span></h2>
<hr>

@include('users._form', ['action'=> 'store'])

<p><a href="{{url('users')}}">Back</a></p>
</div>
@endsection