@extends('layouts.app')
@section('content')
<div class="col-sm-12">
<h2>Chỉnh sửa <span class='muted'>tài khoản</span></h2>
<hr>
@include('users._form', ['users' => $users, 'action'=> 'update'])

</div>
@endsection