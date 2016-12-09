<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>CMS - Nhóm 8</title>

	<!-- Fonts -->
	<link rel="stylesheet" href="{{URL::asset('css/font-awesome.css')}}">
	<!-- Styles -->
	<link rel="stylesheet" href="{{URL::asset('css/bootstrap.css')}}">
	<link rel="stylesheet" href="{{URL::asset('css/multistep.css')}}">
	<link rel="stylesheet" href="{{URL::asset('css/styles.css')}}">
	<link rel="stylesheet" href="{{URL::asset('css/timeline.css')}}">
	<link rel="stylesheet" href="{{URL::asset('css/sb-admin-2.css')}}">
	{{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
</head>
<body id="app-layout">
<nav class="navbar navbar-default navbar-static-top">
	<div class="container">
		<div class="navbar-header">

			<!-- Collapsed Hamburger -->
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
				<span class="sr-only">Toggle Navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>

			<!-- Branding Image -->
			<a class="navbar-brand">
				CMS - Nhóm 8
			</a>
		</div>

		<div class="collapse navbar-collapse" id="app-navbar-collapse">
			<!-- Left Side Of Navbar -->
			{{--<ul class="nav navbar-nav">
				<li><a href="{{ url('/home') }}">Home</a></li>
			</ul>

			<!-- Right Side Of Navbar -->
			<ul class="nav navbar-nav navbar-right">
				<!-- Authentication Links -->
				@if (Auth::guest())
					<li><a href="{{ url('/login') }}">Login</a></li>
					<li><a href="{{ url('/register') }}">Register</a></li>
				@else
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
							{{ Auth::user()->name }} <span class="caret"></span>
						</a>

						<ul class="dropdown-menu" role="menu">
							<li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
						</ul>
					</li>
				@endif
			</ul>--}}
		</div>
	</div>
</nav>

@yield('content')
@yield('body')
<!-- JavaScripts -->
<script src="{{URL::asset('js/jquery.js')}}"></script>
<script src="{{URL::asset('js/bootstrap.js')}}"></script>
<script src="{{URL::asset('js/multistep.js')}}"></script>
<script src="{{URL::asset('js/sb-admin-2.js')}}"></script>
<script src="{{URL::asset('js/frontend.js')}}"></script>
<script src="{{URL::asset('js/metisMenu.js')}}"></script>
<script src="{{URL::asset('js/Chart.js')}}"></script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>