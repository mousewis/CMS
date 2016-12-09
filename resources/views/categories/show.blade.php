@extends('layouts.app')
@section('content')
<div class="container">
<h2>Viewing <span class='muted'><?=$categories->cate_id?></span></h2>
<br>	<p><strong>Cate Name</strong>
	<?=$categories->cate_name?><p>
<p>
	<a href="{{url('categories/edit/'.$categories->cate_id)}}"> Edit</a> |
	<a href="{{url('categories')}}">Back</a>
</p>
</div>
@endsection