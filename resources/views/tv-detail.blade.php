@extends('components.master')
@section('title')
<?php
if (!array_key_exists('name', $tvDetail)) {
	echo "Series";
} else {
	echo $tvDetail['name'];
}
?>
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
					<img src="https://image.tmdb.org/t/p/w500/{{$tvDetail['poster_path']}}" alt="{{$tvDetail['name']}}">
					<div class="movie-btn">
						<div class="btn-transform transform-vertical red">
							<div><a href="#" class="item item-1 redbtn"> <i class="ion-play"></i> ดูตัวอย่าง</a></div>
							<div><a href="https://www.youtube.com/embed/<?php
																		if (!empty($tvTrailer['videos']['results'])) {
																			foreach ($tvTrailer['videos']['results'] as $key => $value) {
																				if ($value['type'] == 'Trailer') {
																					echo $value['key'];
																				}
																			}
																		} else {
																			foreach ($tvTrailerEn['videos']['results'] as $key => $value) {
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
					<h1 class="bd-hd">{{$tvDetail['name']}}</h1>

					<div class="movie-rate">
						<div class="rate">
							<i class="ion-android-star"></i>
							<p><span>{{$tvDetail['vote_average']}}</span> /10<br>
							</p>
						</div>
						<div class="rate-star">
							<p>คะแนนซีรีส์: </p>
							<i class="@if($tvDetail['vote_average'] >= 1) ion-ios-star @else ion-ios-star-outline @endif"></i>
							<i class="@if($tvDetail['vote_average'] >= 2) ion-ios-star @else ion-ios-star-outline @endif"></i>
							<i class="@if($tvDetail['vote_average'] >= 3) ion-ios-star @else ion-ios-star-outline @endif"></i>
							<i class="@if($tvDetail['vote_average'] >= 4) ion-ios-star @else ion-ios-star-outline @endif"></i>
							<i class="@if($tvDetail['vote_average'] >= 5) ion-ios-star @else ion-ios-star-outline @endif"></i>
							<i class="@if($tvDetail['vote_average'] >= 6) ion-ios-star @else ion-ios-star-outline @endif"></i>
							<i class="@if($tvDetail['vote_average'] >= 7) ion-ios-star @else ion-ios-star-outline @endif"></i>
							<i class="@if($tvDetail['vote_average'] >= 8) ion-ios-star @else ion-ios-star-outline @endif"></i>
							<i class="@if($tvDetail['vote_average'] >= 9) ion-ios-star @else ion-ios-star-outline @endif"></i>
							<i class="@if($tvDetail['vote_average'] >= 10) ion-ios-star @else ion-ios-star-outline @endif"></i>
						</div>
					</div>
					<div class="movie-tabs">
						<div class="tabs">
							<ul class="tab-links tabs-mv">
								<li class="active"><a href="#overview">ภาพรวม</a></li>
								<li><a href="#cast"> นักแสดง & ทีมงาน </a></li>
								<li><a href="#moviesrelated">ซีรีส์ที่แนะนำ</a></li>
							</ul>
							<div class="tab-content">
								<div id="overview" class="tab active">
									<div class="row">
										<div class="col-md-8 col-sm-12 col-xs-12">
											<p>{{$tvDetail['overview']}}</p>
											<div class="title-hd-sm">
												<h4>รูปภาพ</h4>
											</div>
											<div class="mvsingle-item ov-item">
												@foreach ($tvDetail['images']['posters'] as $tvPoster)
												@if ($loop->index < 4) <a class="img-lightbox" data-fancybox-group="gallery" href="https://image.tmdb.org/t/p/w500/{{$tvPoster['file_path']}}"><img style="height: 100px; width:100px;" src="https://image.tmdb.org/t/p/w500/{{$tvPoster['file_path']}}" alt="{{$tvDetail['name']}}"></a>
													@endif
													@endforeach
											</div>
											<div class="title-hd-sm">
												<h4>cast</h4>
											</div>
											<!-- movie cast -->
											<div class="mvcast-item">
												@foreach ($tvDetail['credits']['cast'] as $tvCast)
												@if ($loop->index < 6) <div class="cast-it">
													<div class="cast-left">
														<img src="https://image.tmdb.org/t/p/w500/{{$tvCast['profile_path']}}" alt="" height="40px" width="40px">
														<a href="{{url('person/'.$tvCast['id'].'')}}">{{$tvCast['name']}}</a>
													</div>
													<p>{{$tvCast['character']}}</p>
											</div>
											@endif
											@endforeach
										</div>
									</div>
									<div class="col-md-4 col-xs-12 col-sm-12">
										<div class="sb-it">
											<h6>บริษัทผู้ผลิต: </h6>
											<p>
												@foreach ($tvDetail['production_companies'] as $company)
												{{$company['name']}}
												@endforeach
											</p>
										</div>
										<div class="sb-it">
											<h6>ประเทศที่ผลิต: </h6>
											@foreach ($tvDetail['production_countries'] as $country)
											<p>{{$country['name']}}</p>
											@endforeach
										</div>
										<div class="sb-it">
											<h6>ประเภท:</h6>
											<p class="tags">
												@foreach ($tvDetail['genres'] as $genre)
												<span class="time"><a href="#">{{$genre['name']}}</a></span>
												@endforeach
											</p>
										</div>
										<div class="sb-it">
											<h6>วันที่ออกฉาย:</h6>
											<p>{{$tvDetail['first_air_date']}}</p>
										</div>
										<div class="sb-it">
											<h6>Season:</h6>
											<p>{{count($tvDetail['seasons'])}}</p>
										</div>
										<div class="sb-it">
											<h6>ภาษา:</h6>
											<p>@foreach ($tvDetail['spoken_languages'] as $lang)
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
									<h2>{{$tvDetail['name']}}</h2>
									<div class="title-hd-sm">
										<h4>นักแสดงทั้งหมด</h4>
									</div>
									<div class="mvcast-item">
										@foreach ($tvDetail['credits']['cast'] as $fullCast)
										@if ($loop->index < 20) <div class="cast-it">
											<div class="cast-left">
												<img src="https://image.tmdb.org/t/p/w500/{{$fullCast['profile_path']}}" alt="{{$tvDetail['name']}}" height="40px" width="40px">
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
								<h3>ซีรีส์แนะนำของ</h3>
								<h2>{{$tvDetail['name']}}</h2>
								@foreach ($tvDetail['recommendations']['results'] as $tvRec)
								@if ($loop->index < 10) <div class="movie-item-style-2">
									<img src="https://image.tmdb.org/t/p/w500/{{$tvRec['poster_path']}}" alt="">
									<div class="mv-item-infor">
										<h6><a href="{{url('tv/'.$tvRec['id'].'')}}">{{$tvRec['name']}}</a></h6>
										<p class="rate"><i class="ion-android-star"></i><span>{{$tvRec['vote_average']}}</span> /10</p>
										<p class="describe">{{$tvRec['overview']}}</p>
										<p class="run-time"><span>วันที่ออกฉาย: {{$tvRec['first_air_date']}}</span></p>
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