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
        </table>
        <p>

            <a href="{{url('admin/comments/edit/'.$comments->comm_id)}}">Sửa</a> |
            <a href="{{url('admin/comments')}}">Trở lại</a>
        </p>
    </div>
@endsection