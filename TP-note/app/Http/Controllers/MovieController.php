<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Movie;

class MovieController extends Controller
{
	public function create(Request $request) {
		if ( !$request->filled(['title','type','realisator','date','synopsis']) )
			return to_route('view_formmovie')->with('message',"Some POST data are missing.");

		$movie = new Movie;
		$movie->title = $request->title;
		$movie->type = $request->type;
		$movie->realisator = $request->realisator;
		$movie->date = $request->date;
		$movie->synopsis = $request->synopsis;



		try {
			$movie->user()->associate($request->user);
			$movie->save();
		}

		catch (\Exception $e) {
			return to_route('view_formmovie')->with('message',$e->getMessage());
		}

		return to_route('view_account')->with('message',"Movie added!");
	}

	public function showMovies(Request $request) {
		try {
			$movies = Movie::all();
			return view('movieList', ['movies' => $movies]);
		}
		catch (\Exception $e) {
			return to_route('view_account')->with('message',$e->getMessage());
		}
	}

	public function showUserMovies(Request $request) {
		try {
			$movies = Movie::where('login', $request->user->login)->get();
			return view('movieList', ['movies' => $movies]);
		}
		catch (\Exception $e) {
			return to_route('view_account')->with('message',$e->getMessage());
		}


	}

	public function delete(Request $request, $id) {
		try {
			$movie = Movie::find($id);
			$movie->delete();
			return to_route('view_account')->with('message',"Movie deleted!");

		}
			catch (\Exception $e) {
				return to_route('view_account')->with('message',$e->getMessage());
		}


	}


	public function showOneMovie(Request $request, $id) {
		try {
			$movie = Movie::find($id);
			return view('OneMovie', ['movie' => $movie]);
		}
		catch (\Exception $e) {
			return to_route('view_account')->with('message',$e->getMessage());
		}

	}

}
