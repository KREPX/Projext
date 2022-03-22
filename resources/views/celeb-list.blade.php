@extends('components.master')
@section('title')
    Popular Celebrities
@endsection
@section('content')
<div class="hero common-hero" style="background-size: cover;">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1>นักแสดงยอดนิยม</h1>
					<ul class="breadcumb">
						<li class="active"><a href="{{url('/')}}">หน้าแรก</a></li>
						<li> <span class="ion-ios-arrow-right"></span>นักแสดงยอดนิยม</li>
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
				<p>พบ <span>100 นักแสดงยอดนิยม</span> จากทั้งหมด</p>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12 center">				
				<div class="flex-wrap-movielist">
					@foreach ($celebs as $celeb)
						<div class="movie-item-style-2 movie-item-style-1">
							<a href="{{url('person/'.$celeb['id'].'')}}">
								<img src="@if ($celeb['profile_path'] == null) {{asset('images/uploads/blog-it1.jpg')}} @else https://image.tmdb.org/t/p/w500/{{$celeb['profile_path']}} @endif" alt="{{$celeb['name']}}" width="170px" height="255px">
							</a>
							<div class="hvr-inner">
								<a href="{{url('person/'.$celeb['id'].'')}}"> อ่านเพิ่มเติม <i class="ion-android-arrow-dropright"></i> </a>
							</div>
							<div class="mv-item-infor">
								<h6><a href="{{url('person/'.$celeb['id'].'')}}">{{$celeb['name']}}</a></h6>
								<p class="rate"><i class="ion-android-star"></i><span>{{$celeb['popularity']}}</span></p>
							</div>
						</div>
					@endforeach
				</div>
				<div class="topbar-filter">
					<div class="pagination2">
						<span>หน้า 1 จาก 5:</span>
						<a @if (Request::segment(2) == 1) class="active" @endif href="{{url('celeb/1')}}">1</a>
						<a @if (Request::segment(2) == 2) class="active" @endif href="{{url('celeb/2')}}">2</a>
						<a @if (Request::segment(2) == 3) class="active" @endif href="{{url('celeb/3')}}">3</a>
						<a @if (Request::segment(2) == 4) class="active" @endif href="{{url('celeb/4')}}">4</a>
						<a @if (Request::segment(2) == 5) class="active" @endif href="{{url('celeb/5')}}">5</a>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
@endsection