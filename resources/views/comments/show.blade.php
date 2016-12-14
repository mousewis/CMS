@extends('layouts.app')
@section('content')
    <div class="col-sm-12">
        <h2>Xem bình luận <span class='muted'><?=$comments->comm_id?></span></h2>
        <br>
        <table>
            <tr>
                <th><strong>Bài đăng</strong></th>
                <td><?=$comments->comm_post?></td>
            </tr>
            <tr>
                <th><strong>Thời gian</strong></th>
                <td><?=$comments->comm_created_at?></td>
            </tr>
            <tr>
                <th><strong>Email</strong></th>
                <td><?=$comments->comm_email?></td>
            </tr>
            <tr>
                <th><strong>Họ tên</strong></th>
                <td><?=$comments->comm_name?></td>
            </tr>
            <tr>
                <th><strong>Nội dung</strong></th>
                <td><?=$comments->comm_content?></td>
            </tr>
            <tr>
                <th><strong>Trạng thái</strong></th>
                <td><?=($comments->comm_content==0)?'Chưa duyệt':'Đã duyệt'?></td>
            </tr>
        </table>
        <p>
            <form action="{{url('admin/comments/update/'.$comments->comm_id)}}" method="post">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="comm_id" value="<?=$comments->comm_id ?>">
            <input type="hidden" name="comm_status" value="<?= ($comments->comm_status==0)?'1':'0' ?>">
            <button type="submit" class="btn btn-lg"><?= ($comments->comm_status==0)?'Duyệt bình luận':'Ẩn bình luận' ?></button>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
        </form>
        </p>
    </div>
@endsection