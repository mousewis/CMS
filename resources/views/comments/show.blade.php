@extends('layouts.app')
@section('content')
<div class="container">
<h2>Viewing <span class='muted'><?=$comments->comm_id?></span></h2>
<br>	<p><strong>Comm Post</strong>
	<?=$comments->comm_post?><p>
	<p><strong>Comm Created At</strong>
	<?=$comments->comm_created_at?><p>
	<p><strong>Comm Email</strong>
	<?=$comments->comm_email?><p>
	<p><strong>Comm Name</strong>
	<?=$comments->comm_name?><p>
	<p><strong>Comm Content</strong>
	<?=$comments->comm_content?><p>
<p>
	<a href="{{url('comments/edit/'.$comments->comm_id)}}"> Edit</a> |
	<a href="{{url('comments')}}">Back</a>
</p>
</div>
@endsection