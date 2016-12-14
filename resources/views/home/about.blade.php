@extends('layouts.blog')
@section('content')
    <div class="col-md-8 about-left">
        <div class="about-tre">
            <div class="col-sm-12">
                <div class="welcome-top heading">
                    <h3>GIỚI THIỆU</h3>
                    </div>
                    <div class="welcome-bottom">
                        <img src="<?= isset($opt_blog_avatar)?url('images/'.$opt_blog_avatar):URL::asset('images/avatar.png') ?>" alt="" />
                        <p><?=isset($intro)?$intro:'' ?></p>
                    <p>ĐỒ ÁN PHÁT TRIỂN PHẦN MỀM MÃ NGUỒN MỞ</p>
                        <ul>NHÓM 08
                            <li>MAI HUỲNH</li>
                            <LI>VÕ HUY KHA</LI>
                            <LI>TRẦN ĐẠI PHÚC</LI>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @include('layouts.blog-panel')
@endsection