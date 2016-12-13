@extends((session('user_id')&&(session('user_role')=='admin'))?'layouts.app':'layouts.blog')
@section('content')
<div class="col-sm-12">
<h2>Danh sách <span class='muted'>bài đăng</span></h2>
<a href="<?=url((session('user_id')&&(session('user_role')=='admin'))?'admin/posts/create':'post/create')?>" class = "btn btn-success btn-sm"><i class="glyphicon glyphicon-plus"></i> Thêm bài đăng</a>
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
			<th>Tựa đề</th>
			<th>Trạng thái</th>
			<th>Thời gian tạo</th>
			<th>Cập nhật lần cuối</th>
			<th>Chuyên mục</th>
			<th>Tác giả</th>
			<th width="20%">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($posts as $item): ?>
		<tr>
			<td><?= $item->post_title ?></td>
			<td><?php switch ($item->post_status)
					 {
					case '0': echo 'Giới hạn';
						break;
					case '1': echo 'Công khai';
						break;
					 }
				?></td>
			<td><?= $item->post_created_at ?></td>
			<td><?= $item->post_updated_at ?></td>
			<td><?= $item->cate_name ?></td>
			<td><?= $item->post_author ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<a href="<?=url(((session('user_id')&&(session('user_role')=='admin'))?'admin':'').'/posts/edit/'.$item->post_id)?>" class = "btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i> Sửa</a>
						<a href="<?=url(((session('user_id')&&(session('user_role')=='admin'))?'admin':'').'/posts/delete/'.$item->post_id)?>" class = "btn btn-danger btn-sm" onclick = "return confirm('Bạn chắc chắn?')"><i class="glyphicon glyphicon-trash"></i> Xóa</a>
					</div>
				</div>
		</tr>
<?php endforeach; ?>
	</tbody>
    <tfoot>
    <tr>
        <td colspan="7">
            {{$posts->appends(Request::input())->links()}}
        </td>
    </tr>
    </tfoot>
</table>

<?php else: ?>

<p>Không có bài đăng . </p>

<?php endif; ?>

</div>
@endsection