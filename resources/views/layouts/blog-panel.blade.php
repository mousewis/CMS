<div class="col-md-4 about-right heading">
    <div class="abt-1">
        <h3>Giới thiệu</h3>
        <div class="abt-one">
            <img src="<?= isset($opt_blog_avatar)?url('images/'.$opt_blog_avatar):URL::asset('images/avatar.png') ?>" alt="" class="avatar"/>
            <p><?= (isset($intro))?substr($intro,0,160).'...':'' ?></p>
            <div class="a-btn">
                <a href="{{url('home/about')}}">Xem chi tiết</a>
            </div>
        </div>
    </div>
    <div class="abt-2">
        <h3>CHUYÊN MỤC</h3>
        <ul>
            <?php if (isset($categories)): ?>
                <?php foreach ($categories as $item): ?>
                <li><a href="<?= url('home/posts/category/'.$item->cate_id) ?>"><?= $item->cate_name ?></a> </li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </div>
    <div class="abt-2">
        <h3>BÀI ĐĂNG ĐƯỢC QUAN TÂM</h3>
        <?php if (isset($top_posts)):?>
        <?php foreach ($top_posts as $item): ?>
        <?php if($item->post_status=='1'):?>
        <div class="might-grid">
            <div class="grid-might">
                <a href="<?= url('home/posts/show/'.$item->post_id) ?>">
                    <img src="<?= url('images/'.$item->post_image) ?>" class="img-responsive" alt=""> </a>
            </div>
            <div class="might-top">
                <h4><a href="<?= url('home/posts/show/'.$item->post_id) ?>"><?= $item->post_title?></a></h4>
                <p><?= substr(strip_tags(str_replace('<',' <',$item->post_content)),0,80)?></p>
            </div>
            <div class="clearfix"></div>
        </div>
        <?php endif; ?>
<?php endforeach; ?>
        <?php endif; ?>
    </div>

</div>