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
			<th>Tựa đề
				<span>
					<a href="?order=post_title&type=asc"><i class="fa fa-sort-asc"></i> </a>
					<a href="?order=post_title"><i class="fa fa-sort-desc"></i> </a>
			</span>
			</th>
			<th>Trạng thái
				<span>
					<a href="?order=post_status&type=asc"><i class="fa fa-sort-asc"></i> </a>
					<a href="?order=post_status"><i class="fa fa-sort-desc"></i> </a>
			</span>
			</th>
			<th>Thời gian tạo
				<span>
					<a href="?order=post_created_at&type=asc"><i class="fa fa-sort-asc"></i> </a>
					<a href="?order=post_created_at"><i class="fa fa-sort-desc"></i> </a>
			</span>
			</th>
			<th>Cập nhật lần cuối
				<span>
					<a href="?order=post_updated_at&type=asc"><i class="fa fa-sort-asc"></i> </a>
					<a href="?order=post_updated_at"><i class="fa fa-sort-desc"></i> </a>
			</span>
			</th>
			<th>Chuyên mục
				<span>
					<a href="?order=post_category&type=asc"><i class="fa fa-sort-asc"></i> </a>
					<a href="?order=post_category"><i class="fa fa-sort-desc"></i> </a>
			</span>
			</th>
			<th>Tác giả
				<span>
					<a href="?order=post_author&type=asc"><i class="fa fa-sort-asc"></i> </a>
					<a href="?order=post_author"><i class="fa fa-sort-desc"></i> </a>
			</span>
			</th>
			<th>Lượt xem
				<span>
					<a href="?order=post_view&type=asc"><i class="fa fa-sort-asc"></i> </a>
					<a href="?order=post_view"><i class="fa fa-sort-desc"></i> </a>
			</span>
			</th>
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
			<td><?= $item->post_view ?></td>
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