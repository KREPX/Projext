@extends('components.master')
@section('title')
    {{ucfirst(Request::segment(2))}} Movies
@endsection
@section('content')
<div class="hero common-hero" style="background-size: cover;">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1> {{ucfirst(Request::segment(2))}} ภาพยนตร์</h1>
					<ul class="breadcumb">
						<li class="active"><a href="{{url('/')}}">หน้าแรก</a></li>
						<li> <span class="ion-ios-arrow-right"></span>{{Request::segment(2)}} ภาพยนตร์</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="page-single">
	<div class="container">
		<div class="row ipad-width">
			<div class="topbar-filter">
				<p>พบ <span>100 {{Request::segment(2)}} ภาพยนตร์</span> ทั้งหมด</p>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12">				
				<div class="flex-wrap-movielist">
					@foreach ($movies as $movie)
						<div class="movie-item-style-2 movie-item-style-1">
							<a href="{{url('movies/'.$movie['id'].'')}}">
								<img src="@if ($movie['poster_path'] == null) {{asset('images/uploads/blog-it1.jpg')}} @else https://image.tmdb.org/t/p/w500/{{$movie['poster_path']}} @endif" alt="{{$movie['title']}}" width="170px" height="255px">
							</a>
							<div class="hvr-inner">
								<a href="{{url('movies/'.$movie['id'].'')}}"> อ่านเพิ่มเติม <i class="ion-android-arrow-dropright"></i> </a>
							</div>
							<div class="mv-item-infor">
								<h6><a href="{{url('movies/'.$movie['id'].'')}}">{{$movie['title']}}</a></h6>
								<p class="rate"><i class="ion-android-star"></i><span>{{$movie['vote_average']}}</span> /10</p>
							</div>
						</div>
					@endforeach
				</div>
				<div class="topbar-filter">
					<div class="pagination2">
						<span>หน้า 1 จาก 5:</span>
						<a @if (Request::segment(3) == 1) class="active" @endif href="{{url('movie/'.Request::segment(2).'/1')}}">1</a>
						<a @if (Request::segment(3) == 2) class="active" @endif href="{{url('movie/'.Request::segment(2).'/2')}}">2</a>
						<a @if (Request::segment(3) == 3) class="active" @endif href="{{url('movie/'.Request::segment(2).'/3')}}">3</a>
						<a @if (Request::segment(3) == 4) class="active" @endif href="{{url('movie/'.Request::segment(2).'/4')}}">4</a>
						<a @if (Request::segment(3) == 5) class="active" @endif href="{{url('movie/'.Request::segment(2).'/5')}}">5</a>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
@endsection