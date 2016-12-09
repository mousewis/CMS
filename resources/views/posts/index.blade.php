@extends('layouts.app')
@section('content')
<div class="container">
<h2>Listing <span class='muted'>Posts</span></h2>
<a href="<?=url('posts/create')?>" class = "btn btn-success btn-sm"><i class="glyphicon glyphicon-plus"></i> Create posts</a>
<hr>
@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
<?php if (isset($posts)): ?>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Post Title</th>
			<th>Post Image</th>
			<th>Post Content</th>
			<th>Post Tags</th>
			<th>Post Status</th>
			<th>Post Created At</th>
			<th>Post Updated At</th>
			<th>Post Category</th>
			<th>Post Author</th>
			<th width="20%">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($posts as $item): ?>
		<tr>
			<td><?= $item->post_title ?></td>
			<td><?= $item->post_image ?></td>
			<td><?= $item->post_content ?></td>
			<td><?= $item->post_tags ?></td>
			<td><?= $item->post_status ?></td>
			<td><?= $item->post_created_at ?></td>
			<td><?= $item->post_updated_at ?></td>
			<td><?= $item->post_category ?></td>
			<td><?= $item->post_author ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<a href="<?=url('posts/show/'.$item->post_id)?>" class = "btn btn-info btn-sm"><i class="glyphicon glyphicon-eye-open"></i> View</a>
						<a href="<?=url('posts/edit/'.$item->post_id)?>" class = "btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
						<a href="<?=url('posts/delete/'.$item->post_id)?>" class = "btn btn-danger btn-sm" onclick = "return confirm('Are you sure?')"><i class="glyphicon glyphicon-trash"></i> Delete</a>
					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>
	</tbody>
</table>

<?php else: ?>

<p>No posts . </p>

<?php endif; ?>

</div>
@endsection