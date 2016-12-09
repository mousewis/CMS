@extends('layouts.app')
@section('content')
<div class="container">
<h2>Listing <span class='muted'>Options</span></h2>
<a href="<?=url('options/create')?>" class = "btn btn-success btn-sm"><i class="glyphicon glyphicon-plus"></i> Create options</a>
<hr>
@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
<?php if (isset($options)): ?>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Opt Name</th>
			<th>Opt Detail</th>
			<th>Opt Updated At</th>
			<th width="20%">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($options as $item): ?>
		<tr>
			<td><?= $item->opt_name ?></td>
			<td><?= $item->opt_detail ?></td>
			<td><?= $item->opt_updated_at ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<a href="<?=url('options/show/'.$item->opt_id)?>" class = "btn btn-info btn-sm"><i class="glyphicon glyphicon-eye-open"></i> View</a>
						<a href="<?=url('options/edit/'.$item->opt_id)?>" class = "btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
						<a href="<?=url('options/delete/'.$item->opt_id)?>" class = "btn btn-danger btn-sm" onclick = "return confirm('Are you sure?')"><i class="glyphicon glyphicon-trash"></i> Delete</a>
					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>
	</tbody>
</table>

<?php else: ?>

<p>No options . </p>

<?php endif; ?>

</div>
@endsection