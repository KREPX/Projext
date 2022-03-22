<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TvController extends Controller
{
    public $apikey = '?api_key=e465b8d391e0c2db2a2b60cbfc7f45b7';

    public function show($id)
    {
        
        $tvDetail = Http::get('https://api.themoviedb.org/3/tv/'.$id.''.$this->apikey.'&language=th&append_to_response=videos,images,credits,recommendations')
            ->json();

        $tvTrailer = Http::get('https://api.themoviedb.org/3/tv/'.$id.''.$this->apikey.'&append_to_response=videos')
            ->json();
        
        $tvTrailerEn = Http::get('https://api.themoviedb.org/3/tv/'.$id.''.$this->apikey.'&append_to_response=videos')
            ->json();
        return view('tv-detail', [
            'tvDetail'  => $tvDetail,
            'tvTrailer'  => $tvTrailer,
            'tvTrailerEn'  => $tvTrailerEn,
        ]);
        
    }

    public function popular($page)
    {
        $pages = [1, 2, 3, 4, 5];
        if (in_array($page, $pages)) {
            if ($page == 1) {
                $tvShows = Http::get('https://api.themoviedb.org/3/tv/popular'.$this->apikey.'&language=th'.'')
                    ->json()['results'];
                return view('tv-list', [
                    'tvShows' => $tvShows,
                ]);
            }
            else {
                $tvShows = Http::get('https://api.themoviedb.org/3/tv/popular'.$this->apikey.'&language=th'.'&page='.$page.'')
                    ->json()['results'];
                return view('tv-list', [
                    'tvShows' => $tvShows,
                ]);
            }

        }
        else {
            return abort(404);
        }
    }

    public function airing($page)
    {
        $pages = [1, 2, 3, 4, 5];
        if (in_array($page, $pages)) {
            if ($page == 1) {
                $tvShows = Http::get('https://api.themoviedb.org/3/tv/airing_today'.$this->apikey.'&language=th'.'')
                    ->json()['results'];
                return view('tv-list', [
                    'tvShows' => $tvShows,
                ]);
            }
            else {
                $tvShows = Http::get('https://api.themoviedb.org/3/tv/airing_today'.$this->apikey.'&language=th'.'&page='.$page.'')
                    ->json()['results'];
                return view('tv-list', [
                    'tvShows' => $tvShows,
                ]);
            }

        }
        else {
            return abort(404);
        }
    }

    public function ontv($page)
    {
        $pages = [1, 2, 3, 4, 5];
        if (in_array($page, $pages)) {
            if ($page == 1) {
                $tvShows = Http::get('https://api.themoviedb.org/3/tv/on_the_air'.$this->apikey.'&language=th'.'')
                    ->json()['results'];
                return view('tv-list', [
                    'tvShows' => $tvShows,
                ]);
            }
            else {
                $tvShows = Http::get('https://api.themoviedb.org/3/tv/on_the_air'.$this->apikey.'&language=th'.'&page='.$page.'')
                    ->json()['results'];
                return view('tv-list', [
                    'tvShows' => $tvShows,
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
                $tvShows = Http::get('https://api.themoviedb.org/3/tv/top_rated'.$this->apikey.'&language=th'.'')
                    ->json()['results'];
                return view('tv-list', [
                    'tvShows' => $tvShows,
                ]);
            }
            else {
                $tvShows = Http::get('https://api.themoviedb.org/3/tv/top_rated'.$this->apikey.'&language=th'.'&page='.$page.'')
                    ->json()['results'];
                return view('tv-list', [
                    'tvShows' => $tvShows,
                ]);
            }

        }
        else {
            return abort(404);
        }
    }
}
