@extends('layouts.app')
@section('content')
<div class="col-sm-12">
<h2>Chỉnh sửa <span class='muted'>bài đăng</span></h2>
<hr>
@include('posts._form', ['posts' => $posts, 'action'=> 'update'])
</div>
@endsection