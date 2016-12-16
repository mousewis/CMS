@extends('layouts.blog')
@section('content')

    <?php if (isset($post)): ?>
<div class="col-md-8 about-left">
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
<a href="#"><img class="img-responsive" src="<?=url('images/'.$post->post_image)?>" alt=" "></a>
<div class=" single-grid">
    <h4><?= $post->post_title?></h4>
    <ul class="blog-ic">
        <li><a href="#"><span> <i  class="glyphicon glyphicon-user"> </i><?=$post->post_author ?></span> </a> </li>
        <li><span><i class="glyphicon glyphicon-time"> </i><?=$post->post_created_at ?></span></li>
        <li><span><i class="glyphicon glyphicon-eye-open"> </i>Lượt xem:<?= $post->post_view ?></span></li>
    </ul>
<?=$post->post_content ?>
    <ul class="blog-ic">
        <li><span>#<?=str_replace(',',' #',$post->post_tags) ?></span></li>
    </ul>
</div>
<div class="comments heading">
    <h3>Bình luận</h3>
    <?php if(isset($comments)): ?>
    <?php foreach ($comments as $item): ?>
    <div class="media">
        <div class="media-body">
            <h4 class="media-heading">	<?= $item->comm_name ?></h4>
            <ul class="blog-ic">
                <li><span><i class="fa fa-mail-forward"></i><?= $item->comm_email ?> </span></li>
                <li><span><i class="fa fa-clock-o"></i><?= $item->comm_created_at ?> </span></li>
            </ul>
            <p><?= $item->comm_content?></p>
        </div>
    </div>
    <?php endforeach; ?>
        {{$comments->appends(Request::input())->links()}}
    <?php else: ?>
    <p>Không có bình luận</p>
    <?php endif; ?>
</div>
<div class="comment-bottom heading">
    <h3>Viết bình luận</h3>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{url('home/comments/store')}}" method="post">
        <input type="hidden" name="comm_post" value="<?= $post->post_id ?>">
        <input name="comm_name" type="text" placeholder="Họ tên">
        <input name="comm_email" type="email" placeholder="Email">
        <textarea name="comm_content" cols="77" rows="6" placeholder="Bình luận" required></textarea>
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="submit" value="Gửi">
    </form>
</div>
</div>
    <?php endif?>
    @include('layouts.blog-panel')
@endsection