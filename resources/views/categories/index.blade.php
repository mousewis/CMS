@extends('layouts.app')
@section('content')
<div class="col-sm-12">
<h2>Danh sách <span class='muted'>chuyên mục</span></h2>
<a href="<?=url('admin/categories/create')?>" class = "btn btn-success btn-sm"><i class="glyphicon glyphicon-plus"></i> Thêm chuyên mục</a>
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
			<th>Tên chuyên mục</th>
			<th width="20%">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($categories as $item): ?>
<tr>
			<td>
				<a href="<?=url('admin/posts/category/'.$item->cate_id) ?>"><?= $item->cate_name ?></a></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php if($item->cate_id!=1):?>
						<a href="<?=url('admin/categories/edit/'.$item->cate_id)?>" class = "btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i> Sửa</a>
						<a href="<?=url('admin/categories/delete/'.$item->cate_id)?>" class = "btn btn-danger btn-sm" onclick = "return confirm('Bạn có chắc?')"><i class="glyphicon glyphicon-trash"></i> Xóa</a>
					<?php endif;?>
					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>
	</tbody>
</table>

<?php else: ?>

<p>Không có chuyên mục . </p>

<?php endif; ?>

</div>
@endsection