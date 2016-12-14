@extends('layouts.app')
@section('content')
    <div class="col-sm-12">
        <h2>Danh sách <span class='muted'>bình luận</span></h2>
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
                <th>Bài đăng</th>
                <th>Thời gian</th>
                <th>Email</th>
                <th>Họ tên</th>
                <th>Nội dung</th>
                <th>Trạng thái</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($comments as $item): ?>
            <tr>
                <td><?= $item->comm_post ?></td>
                <td><?= $item->comm_created_at ?></td>
                <td><?= $item->comm_email ?></td>
                <td><?= $item->comm_name ?></td>
                <td><?= substr($item->comm_content, 0, 80) . '...' ?></td>
                <td><?= ($item->comm_status == 1) ? 'Đã duyệt' : 'Chưa duyệt'?>
                    <form action="{{url('admin/comments/update/'.$item->comm_id)}}" method="post">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="comm_id" value="<?=$item->comm_id ?>">
                        <input type="hidden" name="comm_status" value="<?= ($item->comm_status == 0) ? '1' : '0' ?>">
                        <button type="submit" class="btn-warning btn-sm"><i
                                    class="glyphicon glyphicon-edit"></i><?= ($item->comm_status == 0) ? 'Duyệt' : 'Ẩn' ?>
                        </button>
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                    </form>
                </td>
                <td>
                    <div class="btn-toolbar">
                        <div class="btn-group">

                            <a href="<?=url('admin/comments/show/' . $item->comm_id)?>" class="btn btn-info btn-sm"><i
                                        class="glyphicon glyphicon-eye-open"></i> Xem</a>
                            <a href="<?=url('admin/comments/delete/' . $item->comm_id)?>" class="btn btn-danger btn-sm"
                               onclick="return confirm('bạn có chắc muốn xóa bình luận này?')"><i
                                        class="glyphicon glyphicon-trash"></i> Xóa</a>
                        </div>
                    </div>

                </td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="7">
                    {{$comments->appends(Request::input())->links()}}
                </td>
            </tr>
            </tbody>
        </table>

        <?php else: ?>

        <p>Không có bình luận . </p>

        <?php endif; ?>

    </div>
@endsection