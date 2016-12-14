@extends('layouts.blog')
@section('content')
    <div class="col-md-8 about-left">
        <div class="about-tre">
            <?php if (isset($posts)):?>
            <?php $count = 1 ?>
            <?php foreach ($posts as $item): ?>
            <?php if($count % 2 != 0):?>
            <?php endif; ?>
                <div class="col-md-6 abt-left">
                    <a href="<?= url('home/posts/show/' . $item->post_id) ?>">
                        <img src="<?= url('images/' . $item->post_image) ?>" alt="" style="width: 100%;height: 200px"/></a>
                    <h6><?= $item->cate_name?></h6>
                    <h3><a href="<?= url('home/posts/show/' . $item->post_id) ?>"><?= $item->post_title ?></a></h3>
                    <p><?= substr(strip_tags(str_replace('<', ' <', $item->post_content)), 0, 160)?></p>
                    <label><?= $item->post_created_at?></label>
                </div>
                <?php if($count % 2 == 0):?>
                <div class="clearfix"></div>

            <?php endif; ?>
            <?php $count += 1 ?>
            <?php endforeach; ?>
            {{$posts->appends(Request::input())->links()}}
            <?php endif; ?>

        </div>
    </div>
    @include('layouts.blog-panel')
@endsection