@extends('layouts.mainLayout')


@section('title','Movie')


@section('content')
	<h1>Movie</h1>
	<ul>
		<li>Title: {{ $movie->title }}</li>
		<li>Type: {{ $movie->type }}</li>
		<li>Realisator: {{ $movie->realisator }}</li>
		<li>Date: {{ $movie->date }}</li>
		<li>Synopsis: {{ $movie->synopsis }}</li>
	</ul>

	<a href="{{ route('movie_delete', $movie->id) }}">Delete</a>
	<a href="{{ route('movie_userlist') }}">Back to my movies</a>

@endsection


