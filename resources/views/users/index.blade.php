@extends('layouts.app')
@section('content')
<div class="container">
<h2>Listing <span class='muted'>Users</span></h2>
<a href="<?=url('users/create')?>" class = "btn btn-success btn-sm"><i class="glyphicon glyphicon-plus"></i> Create users</a>
<hr>
@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
<?php if (isset($users)): ?>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Uder Password</th>
			<th>User Email</th>
			<th>User Name</th>
			<th>User Role</th>
			<th>User Created At</th>
			<th>User Updated At</th>
			<th width="20%">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($users as $item): ?>
		<tr>
			<td><?= $item->uder_password ?></td>
			<td><?= $item->user_email ?></td>
			<td><?= $item->user_name ?></td>
			<td><?= $item->user_role ?></td>
			<td><?= $item->user_created_at ?></td>
			<td><?= $item->user_updated_at ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<a href="<?=url('users/show/'.$item->user_id)?>" class = "btn btn-info btn-sm"><i class="glyphicon glyphicon-eye-open"></i> View</a>
						<a href="<?=url('users/edit/'.$item->user_id)?>" class = "btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
						<a href="<?=url('users/delete/'.$item->user_id)?>" class = "btn btn-danger btn-sm" onclick = "return confirm('Are you sure?')"><i class="glyphicon glyphicon-trash"></i> Delete</a>
					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>
	</tbody>
</table>

<?php else: ?>

<p>No users . </p>

<?php endif; ?>

</div>
@endsection