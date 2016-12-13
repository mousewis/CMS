@extends('layouts.app')
@section('content')
<div class="col-sm-12">
<h2>Thêm <span class='muted'>chuyên mục</span></h2>
<hr>

@include('categories._form', ['action'=> 'store'])

</div>
@endsection