@extends('layouts.app')
@section('content')
<div class="container">
<h2>Listing <span class='muted'>Categories</span></h2>
<a href="<?=url('categories/create')?>" class = "btn btn-success btn-sm"><i class="glyphicon glyphicon-plus"></i> Create categories</a>
<hr>
@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
<?php if (isset($categories)): ?>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Cate Name</th>
			<th width="20%">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($categories as $item): ?>
		<tr>
			<td><?= $item->cate_name ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<a href="<?=url('categories/show/'.$item->cate_id)?>" class = "btn btn-info btn-sm"><i class="glyphicon glyphicon-eye-open"></i> View</a>
						<a href="<?=url('categories/edit/'.$item->cate_id)?>" class = "btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
						<a href="<?=url('categories/delete/'.$item->cate_id)?>" class = "btn btn-danger btn-sm" onclick = "return confirm('Are you sure?')"><i class="glyphicon glyphicon-trash"></i> Delete</a>
					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>
	</tbody>
</table>

<?php else: ?>

<p>No categories . </p>

<?php endif; ?>

</div>
@endsection