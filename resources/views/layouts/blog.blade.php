<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
    <title>CMS PHÁT TRIỂN PHẦN MỀM MÃ NGUỒN MỞ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="CMS phát triển phần mềm mã nguồn mở" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href="{{URL::asset('css/bootstrap.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{URL::asset('css/style.css')}}" rel='stylesheet' type='text/css' />
    <script src="{{URL::asset('js/jquery.min.js')}}"></script>
    <!---- start-smoth-scrolling---->
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });
        });
    </script>
    <!--start-smoth-scrolling-->
</head>
<body>
<!--header-top-starts-->
<div class="header-top">
    <div class="container">
        <div class="head-main">
            <a href="{{url('/')}}"><img src="<?= isset($opt_blog_logo)?url('images/'.$opt_blog_logo):URL::asset('images/logo-1.png') ?>" alt="" /></a>
        </div>
    </div>
</div>
<!--header-top-end-->
<!--start-header-->
<div class="header">
    <div class="container">
        <div class="head">
            <div class="navigation">
                <span class="menu"></span>
                <ul class="navig">
                    <li><a href="{{url('/')}}"  class="active">Trang chủ</a></li>
                    <li><a href="{{url('home/about')}}">Giới thiệu</a></li>
                </ul>
            </div>
            <div class="header-right">
                <div class="search-bar">
                    <form action="{{url('home/search')}}" method="get">
                    <input type="text" name="keyword" placeholder="Tìm kiếm" required>
                    <input type="submit" value="">
                    </form>
                </div>
                <ul>
                    <li><a href="#"><span class="fb"> </span></a></li>
                    <li><a href="#"><span class="twit"> </span></a></li>
                    <li><a href="#"><span class="pin"> </span></a></li>
                    <li><a href="#"><span class="rss"> </span></a></li>
                    <li><a href="#"><span class="drbl"> </span></a></li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- script-for-menu -->
<!-- script-for-menu -->
<script>
    $("span.menu").click(function(){
        $(" ul.navig").slideToggle("slow" , function(){
        });
    });
</script>
<!-- script-for-menu -->
<!--banner-starts-->

<!--banner-end-->
<!--about-starts-->
<div class="about">
    <div class="container">
            @yield('content')
    </div>
</div>
<!--about-end-->
<!--slide-starts-->

<div class="footer">
    <div class="container">
        <div class="footer-text">
            <p>Phát triển phần mềm mã nguồn mở |MAI HUỲNH|VÕ HUY KHA|TRẦN ĐẠI PHÚC</p>
        </div>
    </div>
</div>
<!--footer-end-->
</body>
</html>