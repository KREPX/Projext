<html lang="en" class="no-js">
<head>
	<!-- Basic need -->
	<title>@yield('title') | {{ config('app.name') }}</title>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<link rel="profile" href="#">
    <link href="{{asset('images/favicon.png')}}" rel="icon">

    <!--Google Font-->
    <link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Dosis:400,700,500|Nunito:300,400,600' />
	<!-- Mobile specific meta -->
	<meta name=viewport content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone-no">

	<!-- CSS files -->
	<link rel="stylesheet" href="{{asset('css/plugins.css')}}">
	<link rel="stylesheet" href="{{asset('css/style.css')}}">
    @livewireStyles
	<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
</head>
<body>
<!--preloading-->
<div id="preloader">
    <img class="logo" src="{{asset('images/logoFinal.png')}}" alt="" width="200" height="100">
    <div id="status">
        <span></span>
        <span></span>
    </div>
</div>
<!--end of preloading-->


<!-- BEGIN | Header -->
<header class="ht-header">
	<div class="container">
		<nav class="navbar navbar-default navbar-custom">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header logo">
				    <div class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					    <span class="sr-only">Toggle navigation</span>
					    <div id="nav-icon1">
							<span></span>
							<span></span>
							<span></span>
						</div>
				    </div>
				    <a href="{{url('/')}}"><img class="logo" src="{{asset('images/logoFinal.png')}}" alt="" width="200" height="58"></a>
			    </div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse flex-parent" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav flex-child-menu menu-left">
						<li class="hidden">
							<a href="#page-top"></a>
						</li>
						<li class="dropdown first">
							<a class="btn btn-default dropdown-toggle lv1" href="{{url('/')}}">หน้าแรก</a>
						</li>
						<li class="dropdown first">
							<a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">
							ภาพยนตร์<i class="fa fa-angle-down" aria-hidden="true"></i>
							</a>
							<ul class="dropdown-menu level1">
								<li><a href="{{url('movie/popular')}}">ที่นิยม</a></li>			
								<li><a href="{{url('movie/now-playing')}}">กำลังฉาย</a></li>
								<li><a href="{{url('movie/upcoming')}}">เร็วๆนี้</a></li>
								<li class="it-last"><a href="{{url('movie/top-rated')}}">ยอดนิยม</a></li>
							</ul>
						</li>
                        <li class="dropdown first">
							<a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">
							ซีรีส์<i class="fa fa-angle-down" aria-hidden="true"></i>
							</a>
							<ul class="dropdown-menu level1">
								<li><a href="{{url('series/popular')}}">ที่นิยม</a></li>			
								<li><a href="{{url('series/airing-today')}}">ออนแอร์วันนี้</a></li>
								<li><a href="{{url('series/on-tv')}}">ทางทีวี</a></li>
								<li class="it-last"><a href="{{url('series/top-rated')}}">ยอดนิยม</a></li>
							</ul>
						</li>
						<li class="dropdown first">
							<a class="btn btn-default lv1" href="{{url('celeb')}}">นักแสดงดัง</a>
						</li>
					</ul>
				</div>
			<!-- /.navbar-collapse -->
	    </nav>
	    
	    <!-- top search form -->
        <livewire:search-dropdown>
</header>
