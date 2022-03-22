<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $apikey = '?api_key=e465b8d391e0c2db2a2b60cbfc7f45b7';
    
    public function index()
    {
        $popularMovies = Http::get('https://api.themoviedb.org/3/movie/popular'.$this->apikey.'&language=th'.'')
            ->json()['results'];

        $upcomingMovies = Http::get('https://api.themoviedb.org/3/movie/upcoming'.$this->apikey.'&language=th'.'')
            ->json()['results'];
        
        $ratedMovies = Http::get('https://api.themoviedb.org/3/movie/top_rated'.$this->apikey.'&language=th'.'')
            ->json()['results'];
        
        $playingMovies = Http::get('https://api.themoviedb.org/3/movie/now_playing'.$this->apikey.'&language=th'.'')
            ->json()['results'];

        $popularTVs = Http::get('https://api.themoviedb.org/3/tv/popular'.$this->apikey.'&language=th'.'')
            ->json()['results'];

        $ratedTVs = Http::get('https://api.themoviedb.org/3/tv/top_rated'.$this->apikey.'&language=th'.'')
            ->json()['results'];
        
        $onairTVs = Http::get('https://api.themoviedb.org/3/tv/on_the_air'.$this->apikey.'&language=th'.'')
        ->json()['results'];

        $todayairTVs = Http::get('https://api.themoviedb.org/3/tv/airing_today'.$this->apikey.'&language=th'.'')
        ->json()['results'];
        
        $popularCelebs = Http::get('https://api.themoviedb.org/3/person/popular'.$this->apikey.'&language=th'.'')
            ->json()['results'];

        $genresArray = Http::get('https://api.themoviedb.org/3/genre/movie/list'.$this->apikey.'&language=th'.'')
            ->json()['genres'];

        $genres = collect($genresArray)->mapWithKeys(function($genre) {
            return [$genre['id'] => $genre['name']];
        });

        // dd($popularMovies);
        return view('index', [
            'popularMovies'     => $popularMovies,
            'upcomingMovies'    => $upcomingMovies,
            'ratedMovies'       => $ratedMovies,
            'playingMovies'     => $playingMovies,
            'popularTVs'        => $popularTVs,
            'ratedTVs'          => $ratedTVs,
            'onairTVs'          => $onairTVs,
            'todayairTVs'       => $todayairTVs,
            'popularCelebs'     => $popularCelebs,
            'genres'            => $genres,
        ]);
    }

    public function show($id)
    {

        $movieDetail = Http::get('https://api.themoviedb.org/3/movie/'.$id.''.$this->apikey.'&language=th&append_to_response=videos,images,credits,recommendations')
            ->json();
            
        $movieDetailen = Http::get('https://api.themoviedb.org/3/movie/'.$id.''.$this->apikey.'&language=en&append_to_response=videos,images,credits,recommendations')
            ->json();

        $movieTrailer = Http::get('https://api.themoviedb.org/3/movie/'.$id.''.$this->apikey.'&language=th&append_to_response=videos')
            ->json();

        $movieTrailerEn = Http::get('https://api.themoviedb.org/3/movie/'.$id.''.$this->apikey.'&append_to_response=videos')
            ->json();


        if (!array_key_exists('id', $movieDetail)) {
            abort(404);
        }
        return view('movie-detail', [
            'movieDetail'   => $movieDetail,
            'movieDetailen'   => $movieDetailen,
            'movieTrailer'   => $movieTrailer,
            'movieTrailerEn'   => $movieTrailerEn,
        ]);
    }

    public function popular($page)
    {
        $pages = [1, 2, 3, 4, 5];
        if (in_array($page, $pages)) {
            if ($page == 1) {
                $movies = Http::get('https://api.themoviedb.org/3/movie/popular'.$this->apikey.'&language=th'.'')
                    ->json()['results'];
                return view('movie-list', [
                    'movies' => $movies,
                ]);
            }
            else {
                $movies = Http::get('https://api.themoviedb.org/3/movie/popular'.$this->apikey.'&language=th'.'&page='.$page.'')
                    ->json()['results'];
                return view('movie-list', [
                    'movies' => $movies,
                ]);
            }

        }
        else {
            return abort(404);
        }
    }

    public function now($page)
    {
        $pages = [1, 2, 3, 4, 5];
        if (in_array($page, $pages)) {
            if ($page == 1) {
                $movies = Http::get('https://api.themoviedb.org/3/movie/now_playing'.$this->apikey.'&language=th'.'')
                    ->json()['results'];
                return view('movie-list', [
                    'movies' => $movies,
                ]);
            }
            else {
                $movies = Http::get('https://api.themoviedb.org/3/movie/now_playing'.$this->apikey.'&language=th'.'&page='.$page.'')
                    ->json()['results'];
                return view('movie-list', [
                    'movies' => $movies,
                ]);
            }

        }
        else {
            return abort(404);
        }
    }

    public function upcoming($page)
    {
        $pages = [1, 2, 3, 4, 5];
        if (in_array($page, $pages)) {
            if ($page == 1) {
                $movies = Http::get('https://api.themoviedb.org/3/movie/upcoming'.$this->apikey.'&language=th'.'')
                    ->json()['results'];
                return view('movie-list', [
                    'movies' => $movies,
                ]);
            }
            else {
                $movies = Http::get('https://api.themoviedb.org/3/movie/upcoming'.$this->apikey.'&language=th'.'&page='.$page.'')
                    ->json()['results'];
                return view('movie-list', [
                    'movies' => $movies,
                ]);
            }

        }
        else {
            return abort(404);
        }
    }

    public function rated($page)
    {
        $pages = [1, 2, 3, 4, 5];
        if (in_array($page, $pages)) {
            if ($page == 1) {
                $movies = Http::get('https://api.themoviedb.org/3/movie/top_rated'.$this->apikey.'&language=th'.'')
                    ->json()['results'];
                return view('movie-list', [
                    'movies' => $movies,
                ]);
            }
            else {
                $movies = Http::get('https://api.themoviedb.org/3/movie/top_rated'.$this->apikey.'&language=th'.'&page='.$page.'')
                    ->json()['results'];
                return view('movie-list', [
                    'movies' => $movies,
                ]);
            }

        }
        else {
            return abort(404);
        }
    }
}
