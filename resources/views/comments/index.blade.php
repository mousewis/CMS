@extends('layouts.app')
@section('content')
<div class="container">
<h2>Listing <span class='muted'>Comments</span></h2>
<a href="<?=url('comments/create')?>" class = "btn btn-success btn-sm"><i class="glyphicon glyphicon-plus"></i> Create comments</a>
<hr>
@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
<?php if (isset($comments)): ?>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Comm Post</th>
			<th>Comm Created At</th>
			<th>Comm Email</th>
			<th>Comm Name</th>
			<th>Comm Content</th>
			<th width="20%">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($comments as $item): ?>
		<tr>
			<td><?= $item->comm_post ?></td>
			<td><?= $item->comm_created_at ?></td>
			<td><?= $item->comm_email ?></td>
			<td><?= $item->comm_name ?></td>
			<td><?= $item->comm_content ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<a href="<?=url('comments/show/'.$item->comm_id)?>" class = "btn btn-info btn-sm"><i class="glyphicon glyphicon-eye-open"></i> View</a>
						<a href="<?=url('comments/edit/'.$item->comm_id)?>" class = "btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
						<a href="<?=url('comments/delete/'.$item->comm_id)?>" class = "btn btn-danger btn-sm" onclick = "return confirm('Are you sure?')"><i class="glyphicon glyphicon-trash"></i> Delete</a>
					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>
	</tbody>
</table>

<?php else: ?>

<p>No comments . </p>

<?php endif; ?>

</div>
@endsection