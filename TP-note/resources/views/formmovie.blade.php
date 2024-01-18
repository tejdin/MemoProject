@extends('layouts.mainLayout')

@section('title','Add movie')

@section('content')
	<h1>Add movie</h1>
	<form action="{{ route('movie_addmovie') }}" method="post">
		@csrf
		<label for="title">Title</label><input type="text"     id="title"    name="title"    required autofocus>
		<select name="type" id="type">
			<option value="movie">movie</option>
			<option value="tvshow">tvshow</option>
		</select>
		<label for="realisator">Realisator</label>   <input type="text"     id="realisator"     name="realisator"     required>
		<label for="date">Date</label>               <input type="date"     id="date"     name="date"     required>
		<label for="synopsis">Synopsis</label>       <input type="text"     id="synopsis"     name="synopsis"     required>
		<input type="submit" value="Add movie">
	</form>
