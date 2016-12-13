@extends('layouts.app')
@section('section')

    <!-- /.row -->
    <div class="col-sm-12">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-comments fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">
                                    <?= (isset($comm_total)) ? $comm_total : '0'?></div>
                                <div>Bình luận</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{url('admin/comments')}}">
                        <div class="panel-footer">
                            <span class="pull-left">Xem chi tiết </span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-tasks fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">
                                    <?= (isset($post_total)) ? $post_total : 0 ?>
                                </div>
                                <div>Bài viết</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{url('admin/posts')}}">
                        <div class="panel-footer">
                            <span class="pull-left">Xem chi tiết</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-eye fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?= (isset($view_total)) ? $view_total : 0 ?></div>
                                <div>Lượt xem</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{url('admin/posts')}}">
                        <div class="panel-footer">
                            <span class="pull-left">Xem chi tiết</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- Post-->
        <div class="row">
            <div class="col-lg-9">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-12 text-center">
                                <div>Bài đăng</div>
                            </div>
                        </div>
                    </div>
                    <?php if (isset($post)): ?>
                    <?php foreach ($post as $p): ?>
                    <a href="{{url('admin/post/edit/'.$p->post_id)}}">
                        <div class="panel-footer">
                                                <span class="pull-left">
                                                    <b><?= $p->post_title ?></b>
                                                    |<?= $p->post_author ?>
                                                    |<?= $p->post_created_at ?>
                                                    </span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                    <?php endforeach; ?>
                    <?php endif; ?>
                    <a href="{{url('admin/post')}}">
                        <div class="panel-footer">
                                                <span class="pull-left">
                                                    Xem nhiều hơn</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-9">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-12 text-center">
                                <div>Bình luận</div>
                            </div>
                        </div>
                    </div>
                    <?php if (isset($comment)): ?>
                    <?php foreach ($comment as $comm): ?>
                    <a href="{{url('admin/comment/detail/'.$comm->comm_id)}}">
                        <b><?= $comm->comm_post ?></b>|
                        <?= substr($comm->comm_content, 0, 160)?>...
                    </a>
                    <?php endforeach; ?>
                    <?php endif; ?>
                    <a href="{{url('admin/post')}}">
                        <div class="panel-footer">
                                                <span class="pull-left">
                                                    Xem nhiều hơn</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
    <!-- /.panel .chat-panel -->
@endsection


