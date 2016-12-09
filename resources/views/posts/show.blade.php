@extends('layouts.app')
@section('content')
<div class="container">
<h2>Viewing <span class='muted'><?=$posts->post_id?></span></h2>
<br>	<p><strong>Post Title</strong>
	<?=$posts->post_title?><p>
	<p><strong>Post Image</strong>
	<?=$posts->post_image?><p>
	<p><strong>Post Content</strong>
	<?=$posts->post_content?><p>
	<p><strong>Post Tags</strong>
	<?=$posts->post_tags?><p>
	<p><strong>Post Status</strong>
	<?=$posts->post_status?><p>
	<p><strong>Post Created At</strong>
	<?=$posts->post_created_at?><p>
	<p><strong>Post Updated At</strong>
	<?=$posts->post_updated_at?><p>
	<p><strong>Post Category</strong>
	<?=$posts->post_category?><p>
	<p><strong>Post Author</strong>
	<?=$posts->post_author?><p>
<p>
	<a href="{{url('posts/edit/'.$posts->post_id)}}"> Edit</a> |
	<a href="{{url('posts')}}">Back</a>
</p>
</div>
@endsection