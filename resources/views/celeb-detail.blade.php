@extends('components.master')
@section('title')
{{$celebDetail['name']}}
@endsection
@section('content')

<div class="hero hero3" style="background-size: cover;">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

			</div>
		</div>
	</div>
</div>
<div class="page-single movie-single cebleb-single">
	<div class="container">
		<div class="row ipad-width">
			<div class="col-md-4 col-sm-12 col-xs-12">
				<div class="mv-ceb">
					<img src="@if ($celebDetail['profile_path'] == null) {{asset('images/uploads/cebsingle2.png')}} @else https://image.tmdb.org/t/p/w500/{{$celebDetail['profile_path']}} @endif" alt="{{$celebDetail['name']}}" width="330px" height="495px">
				</div>
			</div>
			<div class="col-md-8 col-sm-12 col-xs-12">
				<div class="movie-single-ct">
					<h1 class="bd-hd">{{$celebDetail['name']}}</h1>
					<p class="ceb-single">{{$celebDetail['known_for_department']}}</p>

					<div class="movie-tabs">
						<div class="tabs">
							<ul class="tab-links tabs-mv">
								<li class="active"><a href="#overviewceb">ภาพรวม</a></li>
								<li><a href="#biography"> ชีวประวัติ</a></li>
								<li><a href="#filmography">ประวัติการแสดง</a></li>
							</ul>
							<div class="tab-content">
								<div id="overviewceb" class="tab active">
									<div class="row">
										<div class="col-md-8 col-sm-12 col-xs-12">
											@if(!empty($celebDetail['biography']))
											<p>{{$celebDetail['biography']}}</p>
											@else
											<p>{{$celebDetailen['biography']}}</p>
											@endif
											<div class="title-hd-sm">
												<h4>รูปภาพ</h4>
											</div>
											<div class="mvsingle-item ov-item">
												@foreach ($celebDetail['images']['profiles'] as $celebPhoto)
												@if ($loop->index < 8) <a class="img-lightbox" data-fancybox-group="gallery" href="https://image.tmdb.org/t/p/w500/{{$celebPhoto['file_path']}}"><img src="https://image.tmdb.org/t/p/w500/{{$celebPhoto['file_path']}}" width="100px" height="100px" alt=""></a>
													@endif
													@endforeach
											</div>
											<div class="title-hd-sm">
												<h4>ประวัติการแสดง</h4>
											</div>
											<!-- movie cast -->
											<div class="mvcast-item">
												@foreach ($celebDetail['movie_credits']['cast'] as $celebCast)
												@if ($loop->index < 4) <div class="cast-it">
													<div class="cast-left cebleb-film">
														<img src="images/uploads/film1.jpg" alt="">
														<div>
															<a href="{{url('movies/'.$celebCast['id'].'')}}">{{$celebCast['title']}} </a>
															<p class="time">@if($celebCast['character'] == null) - @else {{$celebCast['character']}} @endif</p>
														</div>

													</div>
													<p>@if($celebCast['character'] == null) - @else {{$celebCast['character']}} @endif</p>
											</div>
											@endif
											@endforeach
										</div>
									</div>
									<div class="col-md-4 col-xs-12 col-sm-12">
										<div class="sb-it">
											<h6>ชื่อ: </h6>
											<p><a href="#">{{$celebDetail['name']}}</a></p>
										</div>
										<div class="sb-it">
											<h6>วันเกิด: </h6>
											<p>{{$celebDetail['birthday']}}</p>
										</div>
										<div class="sb-it">
											<h6>ประเทศ: </h6>
											<p>{{$celebDetail['place_of_birth']}}</p>
										</div>

									</div>
								</div>
							</div>
							<div id="biography" class="tab">
								<div class="row">
									<div class="rv-hd">
										<div>
											<h3>ชีวประวัติของ</h3>
											<h2>{{$celebDetail['name']}}</h2>
										</div>
									</div>
									@if(!empty($celebDetail['biography']))
									<p>{{$celebDetail['biography']}}</p>
									@else
									<p>{{$celebDetailen['biography']}}</p>
									@endif
								</div>
							</div>
							<div id="filmography" class="tab">
								<div class="row">
									<div class="rv-hd">
										<div>
											<h3>ภาพยนตร์ / ซีรีส์ ของ</h3>
											<h2>{{$celebDetail['name']}}</h2>
										</div>

									</div>
									<div class="topbar-filter">
										<p>พบ <span>{{count($celebDetail['movie_credits']['cast']) + count($celebDetail['movie_credits']['crew'])}} ภาพยนตร์</span> จากทั้งหมด</p>
									</div>
									<!-- movie cast -->
									<div class="mvcast-item">
										@foreach ($celebDetail['movie_credits']['cast'] as $celebMovieCast)
										<div class="cast-it">
											<div class="cast-left cebleb-film">
												<img src="images/uploads/film1.jpg" alt="">
												<div>
													<a href="{{url('movies/'.$celebMovieCast['id'].'')}}">{{$celebMovieCast['title']}} </a>
													<p class="time">@if($celebMovieCast['character'] == null) - @else {{$celebMovieCast['character']}} @endif</p>
												</div>

											</div>
											<p>@if($celebMovieCast['character'] == null) - @else {{$celebMovieCast['character']}} @endif</p>
										</div>
										@endforeach
										<h3>Credits</h3>
										@foreach ($celebDetail['movie_credits']['crew'] as $celebMovieCrew)
										<div class="cast-it">
											<div class="cast-left cebleb-film">
												<img src="images/uploads/film2.jpg" alt="">
												<div>
													<a href="#">{{$celebMovieCrew['title']}} </a>
													<p class="time">{{$celebMovieCrew['job']}}</p>
												</div>
											</div>
											<p>{{$celebMovieCrew['job']}}</p>
										</div>
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
</div>
</div>
</div>
@endsection