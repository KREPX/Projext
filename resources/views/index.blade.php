<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7 no-js" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8 no-js" lang="en-US">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html lang="en" class="no-js">

<head>
    <!-- Basic need -->
    <title>{{ config('app.name')  }} | Homepage</title>
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
    <link rel="stylesheet" href="css/plugins.css">
    <link rel="stylesheet" href="css/style.css">
    @livewireStyles
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
</head>

<body>
    <!--preloading-->
    <div id="preloader">
        <img class="logo" src="images/logoFinal.png" alt="" width="200" height="100">
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
                    <a href="{{url('/')}}"><img class="logo" src="images/logoFinal.png" alt="" width="200" height="58"></a>
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
        </div>
    </header>
    <!-- END | Header -->

    <div class="slider movie-items">
        <div class="container">
            <div class="row">

                <div class="slick-multiItemSlider">
                    @foreach ($popularMovies as $headerMovie)
                    @if ($loop->index < 8) <div class="movie-item">
                        <div class="mv-img">
                            <a href="{{url('movies/'.$headerMovie['id'].'')}}"><img src="https://image.tmdb.org/t/p/w500/{{$headerMovie['poster_path']}}" alt="" width="285" height="437"></a>
                        </div>
                        <div class="title-in">
                            <div class="cate">
                                @foreach ($headerMovie['genre_ids'] as $genre)
                                <span style="@if ($genre == 28)
                                            background-color: #8b1a1a
                                        @elseif ($genre == 12)
                                            background-color: #cd661d
                                        @elseif ($genre == 16)
                                            background-color: #006400
                                        @elseif ($genre == 35)
                                            background-color: #836fff
                                        @elseif ($genre == 80)
                                            background-color: #363636
                                        @elseif ($genre == 99)
                                            background-color: #6f804a
                                        @elseif ($genre == 18)
                                            background-color: #ff69b4
                                        @elseif ($genre == 10751)
                                            background-color: #d15fee
                                        @elseif ($genre == 14)
                                            background-color: #c71585
                                        @elseif ($genre == 36)
                                            background-color: #8b4513
                                        @elseif ($genre == 27)
                                            background-color: #000000
                                        @elseif ($genre == 10749)
                                            background-color: #ff3030
                                        @elseif ($genre == 878)
                                            background-color: #008080
                                        @elseif ($genre == 53)
                                            background-color: #1c0f45
                                        @elseif ($genre == 10752)
                                            background-color: #8b0a5
                                        @elseif ($genre == 37)
                                            background-color: #ff7f50
                                        @else
                                            background-color: #cd9b9b
                                        @endif
                                        "><a href="#">{{$genres->get($genre)}}</a></span>
                                @endforeach
                            </div>
                            <h6><a href="{{url('movies/'.$headerMovie['id'].'')}}">{{$headerMovie['title']}}</a></h6>
                            <p><i class="ion-android-star"></i><span>{{$headerMovie['vote_average']}}</span> /10</p>
                        </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
    </div>
    <div class="movie-items">
        <div class="container">
            <div class="row ipad-width">
                <div class="col-md-12">
                    <div class="col-md-12">
                        <div class="title-hd">
                            <h2 style="text-align: center;">ในโรงภาพยนตร์</h2>
                        </div>
                        <div class="tabs">
                            <ul class="tab-links">
                                <li class="active"><a href="#">#ที่นิยม</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="tab1" class="tab active">
                                    <div class="row">
                                        <div class="slick-multiItem">
                                            @foreach ($popularMovies as $popularMovie)
                                            @if ($loop->index < 12) <div class="slide-it">
                                                <div class="movie-item">
                                                    <div class="mv-img">
                                                        <img src="https://image.tmdb.org/t/p/w500/{{$popularMovie['poster_path']}}" alt="" width="185" height="284">
                                                    </div>
                                                    <div class="hvr-inner">
                                                        <a href="{{url('movies/'.$popularMovie['id'].'')}}"> อ่านเพิ่มเติม <i class="ion-android-arrow-dropright"></i> </a>
                                                    </div>
                                                    <div class="title-in">
                                                        <h6><a href="{{url('movies/'.$popularMovie['id'].'')}}">{{$popularMovie['title']}}</a></h6>
                                                        <p><i class="ion-android-star"></i><span>{{$popularMovie['vote_average']}}</span> /10</p>
                                                    </div>
                                                </div>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                                <a href="{{url('movie/popular')}}" class="viewall" style="float: right">ดูทั้งหมด <i class="ion-ios-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <a href="#" class="viewall">View all <i class="ion-ios-arrow-right"></i></a> -->
                <div class="col-md-12">
                    <div class="tabs">
                        <ul class="tab-links">
                            <li class="active"><a href="#"> #เร็วๆนี้</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab3" class="tab active">
                                <div class="row">
                                    <div class="slick-multiItem">
                                        @foreach ($upcomingMovies as $upcomingMovie)
                                        @if ($loop->index < 12) <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="https://image.tmdb.org/t/p/w500/{{$upcomingMovie['poster_path']}}" alt="" width="185" height="284">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="{{url('movies/'.$upcomingMovie['id'].'')}}"> อ่านเพิ่มเติม <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="{{url('movies/'.$upcomingMovie['id'].'')}}">{{$upcomingMovie['title']}}</a></h6>
                                                    <p><i class="ion-android-star"></i><span>{{$upcomingMovie['vote_average']}}</span> /10</p>
                                                </div>
                                            </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                            <a href="{{url('movie/upcoming')}}" class="viewall" style="float: right">ดูทั้งหมด <i class="ion-ios-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="tabs">
                    <ul class="tab-links">
                        <li class="active"><a href="#"> #ภาพยนตร์ยอดนิยม</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab3" class="tab active">
                            <div class="row">
                                <div class="slick-multiItem">
                                    @foreach ($ratedMovies as $ratedMovie)
                                    @if ($loop->index < 12) <div class="slide-it">
                                        <div class="movie-item">
                                            <div class="mv-img">
                                                <img src="https://image.tmdb.org/t/p/w500/{{$ratedMovie['poster_path']}}" alt="" width="185" height="284">
                                            </div>
                                            <div class="hvr-inner">
                                                <a href="{{url('movies/'.$ratedMovie['id'].'')}}"> อ่านเพิ่มเติม <i class="ion-android-arrow-dropright"></i> </a>
                                            </div>
                                            <div class="title-in">
                                                <h6><a href="{{url('movies/'.$ratedMovie['id'].'')}}">{{$ratedMovie['title']}}</a></h6>
                                                <p><i class="ion-android-star"></i><span>{{$ratedMovie['vote_average']}}</span> /10</p>
                                            </div>
                                        </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                        <a href="{{url('movie/top-rated')}}" class="viewall" style="float: right">ดูทั้งหมด <i class="ion-ios-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="tabs">
                <ul class="tab-links">
                    <li class="active"><a href="#"> #ภาพยนตร์ที่กำลังฉาย</a></li>
                </ul>
                <div class="tab-content">
                    <div id="tab4" class="tab active">
                        <div class="row">
                            <div class="slick-multiItem">
                                @foreach ($playingMovies as $playingMovie)
                                @if ($loop->index < 12) <div class="slide-it">
                                    <div class="movie-item">
                                        <div class="mv-img">
                                            <img src="https://image.tmdb.org/t/p/w500/{{$playingMovie['poster_path']}}" alt="" width="185" height="284">
                                        </div>
                                        <div class="hvr-inner">
                                            <a href="{{url('movies/'.$playingMovie['id'].'')}}"> อ่านเพิ่มเติม <i class="ion-android-arrow-dropright"></i> </a>
                                        </div>
                                        <div class="title-in">
                                            <h6><a href="{{url('movies/'.$playingMovie['id'].'')}}">{{$playingMovie['title']}}</a></h6>
                                            <p><i class="ion-android-star"></i><span>{{$playingMovie['vote_average']}}</span> /10</p>
                                        </div>
                                    </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                    <a href="{{url('movie/top-rated')}}" class="viewall" style="float: right">ดูทั้งหมด <i class="ion-ios-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="title-hd">
            <h2>ซีรีส์</h2>
        </div>
        <div class="tabs">
            <ul class="tab-links-2">
                <li class="active"><a href="#"> #ซีรีส์ที่นิยม</a></li>
            </ul>
            <div class="tab-content">
                <div id="tab21" class="tab active">
                    <div class="row">
                        <div class="slick-multiItem">
                            @foreach ($popularTVs as $popularTV)
                            @if ($loop->index < 12) <div class="slide-it">
                                <div class="movie-item">
                                    <div class="mv-img">
                                        <img src="https://image.tmdb.org/t/p/w500/{{$popularTV['poster_path']}}" alt="" width="185" height="284">
                                    </div>
                                    <div class="hvr-inner">
                                        <a href="{{url('tv/'.$popularTV['id'].'')}}"> อ่านเพิ่มเติม <i class="ion-android-arrow-dropright"></i> </a>
                                    </div>
                                    <div class="title-in">
                                        <h6><a href="{{url('tv/'.$popularTV['id'].'')}}">{{$popularTV['name']}}</a></h6>
                                        <p><i class="ion-android-star"></i><span>{{$popularTV['vote_average']}}</span> /10</p>
                                    </div>
                                </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
                <a href="{{url('series/popular')}}" class="viewall" style="float: right">ดูทั้งหมด <i class="ion-ios-arrow-right"></i></a>
            </div>
        </div>
    </div>
    </div>
    <div class="col-md-12">
        <div class="tabs">
            <ul class="tab-links-2">
                <li class="active"><a href="#"> #ซีรีส์ยอดนิยม</a></li>
            </ul>
            <div class="tab-content">
                <div id="tab21" class="tab active">
                    <div class="row">
                        <div class="slick-multiItem">
                            @foreach ($ratedTVs as $ratedTV)
                            @if ($loop->index < 12) <div class="slide-it">
                                <div class="movie-item">
                                    <div class="mv-img">
                                        <img src="https://image.tmdb.org/t/p/w500/{{$ratedTV['poster_path']}}" alt="" width="185" height="284">
                                    </div>
                                    <div class="hvr-inner">
                                        <a href="{{url('tv/'.$ratedTV['id'].'')}}"> อ่านเพิ่มเติม <i class="ion-android-arrow-dropright"></i> </a>
                                    </div>
                                    <div class="title-in">
                                        <h6><a href="{{url('tv/'.$ratedTV['id'].'')}}">{{$ratedTV['name']}}</a></h6>
                                        <p><i class="ion-android-star"></i><span>{{$ratedTV['vote_average']}}</span> /10</p>
                                    </div>
                                </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
                <a href="{{url('series/top-rated')}}" class="viewall" style="float: right">ดูทั้งหมด <i class="ion-ios-arrow-right"></i></a>
            </div>
        </div>
    </div>
    </div>
    <div class="col-md-12">
        <div class="tabs">
            <ul class="tab-links-2">
                <li class="active"><a href="#"> #ออนแอร์ทางทีวี</a></li>
            </ul>
            <div class="tab-content">
                <div id="tab21" class="tab active">
                    <div class="row">
                        <div class="slick-multiItem">
                            @foreach ($onairTVs as $onairTV)
                            @if ($loop->index < 12) <div class="slide-it">
                                <div class="movie-item">
                                    <div class="mv-img">
                                        <img src="https://image.tmdb.org/t/p/w500/{{$onairTV['poster_path']}}" alt="" width="185" height="284">
                                    </div>
                                    <div class="hvr-inner">
                                        <a href="{{url('tv/'.$onairTV['id'].'')}}"> อ่านเพิ่มเติม <i class="ion-android-arrow-dropright"></i> </a>
                                    </div>
                                    <div class="title-in">
                                        <h6><a href="{{url('tv/'.$onairTV['id'].'')}}">{{$onairTV['name']}}</a></h6>
                                        <p><i class="ion-android-star"></i><span>{{$onairTV['vote_average']}}</span> /10</p>
                                    </div>
                                </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
                <a href="{{url('series/on-tv')}}" class="viewall" style="float: right">ดูทั้งหมด <i class="ion-ios-arrow-right"></i></a>
            </div>
        </div>
    </div>
    </div>
    <div class="col-md-12">
        <div class="tabs">
            <ul class="tab-links-2">
                <li class="active"><a href="#"> #ออนแอร์ซีรีส์วันนี้</a></li>
            </ul>
            <div class="tab-content">
                <div id="tab21" class="tab active">
                    <div class="row">
                        <div class="slick-multiItem">
                            @foreach ($todayairTVs as $todayairTV)
                            @if ($loop->index < 12) <div class="slide-it">
                                <div class="movie-item">
                                    <div class="mv-img">
                                        <img src="https://image.tmdb.org/t/p/w500/{{$todayairTV['poster_path']}}" alt="" width="185" height="284">
                                    </div>
                                    <div class="hvr-inner">
                                        <a href="{{url('tv/'.$todayairTV['id'].'')}}"> อ่านเพิ่มเติม <i class="ion-android-arrow-dropright"></i> </a>
                                    </div>
                                    <div class="title-in">
                                        <h6><a href="{{url('tv/'.$todayairTV['id'].'')}}">{{$todayairTV['name']}}</a></h6>
                                        <p><i class="ion-android-star"></i><span>{{$todayairTV['vote_average']}}</span> /10</p>
                                    </div>
                                </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
                <a href="{{url('series/airing-today')}}" class="viewall" style="float: right">ดูทั้งหมด <i class="ion-ios-arrow-right"></i></a>
            </div>
        </div>
    </div>
    </div>
    </div>
    <div class="ads">

    </div>
    <div class="col-md-12">
        <div class="tabs">
            <div class="title-hd">
                <h2 style="text-align: center;">นักแสดงที่นิยม</h2>
                <a href="{{url('celeb')}}" class="viewall">ดูทั้งหมด <i class="ion-ios-arrow-right"></i></a>
            </div>
            <div class="tab-content">
                <div id="tab21" class="tab active">
                    <div class="row">
                        <div class="slick-multiItem">
                            @foreach ($popularCelebs as $popularCeleb)
                            @if ($loop->index < 12) <div class="slide-it">
                                <div class="movie-item">
                                    <div class="mv-img">
                                        <img src="https://image.tmdb.org/t/p/w500/{{$popularCeleb['profile_path']}}" alt="" width="185" height="284">
                                    </div>
                                    <div class="hvr-inner">
                                        <a href="{{url('person/'.$popularCeleb['id'].'')}}"> อ่านเพิ่มเติม <i class="ion-android-arrow-dropright"></i> </a>
                                    </div>
                                    <div class="title-in">
                                        <h6><a href="{{url('person/'.$popularCeleb['id'].'')}}">{{$popularCeleb['name']}}</a></h6>
                                        <p><i class="ion-android-star"></i><span>{{$popularCeleb['popularity']}}</span></p>
                                    </div>
                                </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>

    @extends('components.footer')
</body>

</html>