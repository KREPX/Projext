@extends('components.master')
@section('title')
{{$movieDetail['title']}}
@endsection
@section('content')
<div class="hero mv-single-hero" style="background-size: cover;">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

			</div>
		</div>
	</div>
</div>
<div class="page-single movie-single movie_single">
	<div class="container">
		<div class="row ipad-width2">
			<div class="col-md-4 col-sm-12 col-xs-12">
				<div class="movie-img sticky-sb">
					<img src="https://image.tmdb.org/t/p/w500/{{$movieDetail['poster_path']}}" alt="{{$movieDetail['title']}}">
					<div class="movie-btn">
						<div class="btn-transform transform-vertical red">
							<div><a href="#" class="item item-1 redbtn"> <i class="ion-play"></i> ดูตัวอย่าง</a></div>
							<div><a href="https://www.youtube.com/embed/<?php

																		if (!empty($movieTrailer['videos']['results'])) {
																			foreach ($movieTrailer['videos']['results'] as $key => $value) {
																				if ($value['type'] == 'Trailer') {
																					echo $value['key'];
																				}
																			}
																		} else {
																			foreach ($movieTrailerEn['videos']['results'] as $key => $value) {
																				if ($value['type'] == 'Trailer') {
																					echo $value['key'];
																				}
																			}
																		}
																		?>" class="item item-2 redbtn fancybox-media hvr-grow"><i class="ion-play"></i></a></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-8 col-sm-12 col-xs-12">
				<div class="movie-single-ct main-content">
					<h1 class="bd-hd">{{$movieDetail['title']}}</h1>


					<div class="movie-rate">
						<div class="rate">
							<i class="ion-android-star"></i>
							<p><span>{{$movieDetail['vote_average']}}</span> /10<br>
							</p>
						</div>
						<div class="rate-star">
							<p>คะแนนภาพยนตร์: </p>
							<i class="@if($movieDetail['vote_average'] >= 1) ion-ios-star @else ion-ios-star-outline @endif"></i>
							<i class="@if($movieDetail['vote_average'] >= 2) ion-ios-star @else ion-ios-star-outline @endif"></i>
							<i class="@if($movieDetail['vote_average'] >= 3) ion-ios-star @else ion-ios-star-outline @endif"></i>
							<i class="@if($movieDetail['vote_average'] >= 4) ion-ios-star @else ion-ios-star-outline @endif"></i>
							<i class="@if($movieDetail['vote_average'] >= 5) ion-ios-star @else ion-ios-star-outline @endif"></i>
							<i class="@if($movieDetail['vote_average'] >= 6) ion-ios-star @else ion-ios-star-outline @endif"></i>
							<i class="@if($movieDetail['vote_average'] >= 7) ion-ios-star @else ion-ios-star-outline @endif"></i>
							<i class="@if($movieDetail['vote_average'] >= 8) ion-ios-star @else ion-ios-star-outline @endif"></i>
							<i class="@if($movieDetail['vote_average'] >= 9) ion-ios-star @else ion-ios-star-outline @endif"></i>
							<i class="@if($movieDetail['vote_average'] >= 10) ion-ios-star @else ion-ios-star-outline @endif"></i>
						</div>
					</div>
					<div class="movie-tabs">
						<div class="tabs">
							<ul class="tab-links tabs-mv">
								<li class="active"><a href="#overview">ภาพรวม</a></li>
								<li><a href="#cast"> นักแสดง & ทีมงาน </a></li>
								<li><a href="#moviesrelated">ภาพยนตร์ที่แนะนำ</a></li>
							</ul>
							<div class="tab-content">
								<div id="overview" class="tab active">
									<div class="row">
										<div class="col-md-8 col-sm-12 col-xs-12">

											@if(!empty($movieDetail['overview']))
											<p>{{$movieDetail['overview']}}</p>
											@else
											<p>{{$movieDetailen['overview']}}</p>
											@endif

											<div class="title-hd-sm">
												<h4>รูปภาพ</h4>
											</div>
											<div class="mvsingle-item ov-item">
												@foreach ($movieDetail['images']['posters'] as $moviePoster)
												@if ($loop->index < 4) <a class="img-lightbox" data-fancybox-group="gallery" href="https://image.tmdb.org/t/p/w500/{{$moviePoster['file_path']}}"><img style="height: 100px; width:100px;" src="https://image.tmdb.org/t/p/w500/{{$moviePoster['file_path']}}" alt="{{$movieDetail['title']}}"></a>
													@endif
													@endforeach
											</div>
											<div class="title-hd-sm">
												<h4>นักแสดง</h4>
											</div>
											<!-- movie cast -->
											<div class="mvcast-item">
												@foreach ($movieDetail['credits']['cast'] as $movieCast)
												@if ($loop->index < 6) <div class="cast-it">
													<div class="cast-left">
														<img src="<?php if ($movieCast['profile_path'] == null) {
																		echo asset('images/uploads/ava2.jpg');
																	} else {
																		echo 'https://image.tmdb.org/t/p/w500/' . $movieCast['profile_path'] . '';
																	} ?>" alt="{{$movieCast['name']}}" height="40px" width="40px">
														<a href="{{url('person/'.$movieCast['id'].'')}}">{{$movieCast['name']}}</a>
													</div>
													<p>{{$movieCast['character']}}</p>
											</div>
											@endif
											@endforeach
										</div>
									</div>
									<div class="col-md-4 col-xs-12 col-sm-12">
										<div class="sb-it">
											<h6>บริษัทผู้ผลิต: </h6>
											<p>
												@foreach ($movieDetail['production_companies'] as $company)
												{{$company['name']}}
												@endforeach
											</p>
										</div>
										<div class="sb-it">
											<h6>ประเทศที่ผลิต: </h6>
											@foreach ($movieDetail['production_countries'] as $country)
											<p>{{$country['name']}}</p>
											@endforeach
										</div>
										<div class="sb-it">
											<h6>ประเภท:</h6>
											<p class="tags">
												@foreach ($movieDetail['genres'] as $genre)
												<span class="time"><a href="#">{{$genre['name']}}</a></span>
												@endforeach
											</p>
										</div>
										<div class="sb-it">
											<h6>วันที่ออกฉาย:</h6>
											<p>{{$movieDetail['release_date']}}</p>
										</div>
										<div class="sb-it">
											<h6>ความยาว:</h6>
											<p>{{$movieDetail['runtime']}} นาที</p>
										</div>
										<div class="sb-it">
											<h6>ภาษา:</h6>
											<p>@foreach ($movieDetail['spoken_languages'] as $lang)
												{{$lang['name']}}
												@endforeach
											</p>
										</div>

									</div>
								</div>
							</div>
							<div id="cast" class="tab">
								<div class="row">
									<h3>นักแสดง & ทีมงาน ของ</h3>
									<h2>{{$movieDetail['title']}}</h2>
									<div class="title-hd-sm">
										<h4>นักแสดงทั้งหมด</h4>
									</div>
									<div class="mvcast-item">
										@foreach ($movieDetail['credits']['cast'] as $fullCast)
										@if ($loop->index < 20) <div class="cast-it">
											<div class="cast-left">
												<img src="<?php if ($fullCast['profile_path'] == null) {
																echo asset('images/uploads/ava2.jpg');
															} else {
																echo 'https://image.tmdb.org/t/p/w500/' . $fullCast['profile_path'] . '';
															} ?>" alt="{{$movieDetail['title']}}" height="40px" width="40px">
												<a href="{{url('person/'.$fullCast['id'].'')}}">{{$fullCast['name']}}</a>
											</div>
											<p>{{$fullCast['character']}}</p>
									</div>
									@endif
									@endforeach
								</div>
							</div>
						</div>
						<div id="moviesrelated" class="tab">
							<div class="row">
								<h3>ภาพยนตร์แนะนำของ</h3>
								<h2>{{$movieDetail['title']}}</h2>
								@foreach ($movieDetail['recommendations']['results'] as $movieRec)
								@if ($loop->index < 10) <div class="movie-item-style-2">
									<img src="https://image.tmdb.org/t/p/w500/{{$movieRec['poster_path']}}" alt="">
									<div class="mv-item-infor">
										<h6><a href="{{url('movies/'.$movieRec['id'].'')}}">{{$movieRec['title']}}</a></h6>
										<p class="rate"><i class="ion-android-star"></i><span>{{$movieRec['vote_average']}}</span> /10</p>
										<p class="describe">{{$movieRec['overview']}}</p>
										<p class="run-time"><span>วันที่ออกฉาย: {{$movieRec['release_date']}}</span></p>
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
</div>
@endsection