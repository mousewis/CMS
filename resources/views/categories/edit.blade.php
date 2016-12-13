@extends('layouts.app')
@section('content')
<div class="col-sm-12">
<h2>Chỉnh sửa <span class='muted'>chuyên mục</span></h2>
<hr>
@include('categories._form', ['categories' => $categories, 'action'=> 'update'])

</div>
@endsection