@extends((session('user_id')&&(session('user_role')=='admin'))?'layouts.app':'layouts.blog')
@section('content')
<div class="col-sm-12">
<h2>Thêm <span class='muted'>bài đăng</span></h2>
<hr>
@include('posts._form', ['action'=> 'store'])
</div>
@endsection