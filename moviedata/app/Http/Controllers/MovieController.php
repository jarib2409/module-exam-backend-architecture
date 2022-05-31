<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;


class MovieController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function search()
    {
        if (isset($_REQUEST['title'])) {
            $search = $_REQUEST['title'];
        }
        else {
            $search = 'avatar';
        }
        $url = 'http://www.omdbapi.com/?s='.$search.'&apikey=8e9882ae&r=json&type=movie';

        $movies = json_decode(file_get_contents($url))->Search;
        //dd(($movies));
        return view('guestDashboard', ['movies' => $movies]);
    }

    public function randomCategory() {
        $search = 'pokemon';
        $url = 'http://www.omdbapi.com/?s='.$search.'&apikey=8e9882ae&r=json&type=movie';

        $movies = json_decode(file_get_contents($url))->Search;
        //dd(($movies));
        return view('guestDashboard', ['movies' => $movies]);
    }


    public function showFavorites() {
        $userId = auth()->user()->id;
        $favorites = Favorite::where(['user_id' => $userId])->get();
        $movies = [];
        foreach ($favorites as $f) {
            $url = 'http://www.omdbapi.com/?i='.$f->movie_id.'&apikey=8e9882ae&r=json&type=movie';
            $movie = json_decode(file_get_contents($url));
            array_push($movies, $movie);
        }
        return view('favorites', ['favorites' => $movies]);
    }
    public function deleteFavorite(Request $request) {
        $userId = auth()->user()->id;
        $movie_id = $request->input('movie_id');
        $fav = Favorite::where(['movie_id' => $movie_id, 'user_id' => $userId])->delete();
        $favorites = Favorite::where(['user_id' => $userId])->get();
        $movies = [];
        foreach ($favorites as $f) {
            $url = 'http://www.omdbapi.com/?i='.$f->movie_id.'&apikey=8e9882ae&r=json&type=movie';
            $movie = json_decode(file_get_contents($url));
            array_push($movies, $movie);
        }
        return view('favorites', ['favorites' => $movies]);
    }

    public function addToFavorites(Request $request) {
        $userId = auth()->user()->id;
        $movie_id = $request->input('movie_id');
        $fav = Favorite::create(['movie_id' => $movie_id, 'user_id' => $userId]);
        $fav->save();
        //dd($fav);
        $favorites = Favorite::where(['user_id' => $userId])->get();
        $movies = [];
        foreach ($favorites as $f) {
            $url = 'http://www.omdbapi.com/?i='.$f->movie_id.'&apikey=8e9882ae&r=json&type=movie';
            $movie = json_decode(file_get_contents($url));
            array_push($movies, $movie);
        }
        return view('favorites', ['favorites' => $movies]);
    }
}
