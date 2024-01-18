@extends('layouts.mainLayout')

@section('title','Account')

@section('content')
	<p>
		Hello {{ session('user')->login }} !<br>
		Welcome on your account.
	</p>
	<p>
		Your favorite genre is {{ session('user')->genre }}.
	</p>
	<ul>
		<li><a href="{{ route('view_formmovie') }}"> add movie</a></li>
		<li><a href="{{ route('movie_userlist') }}">My movies</a></li>
		<li><a href="{{ route('movie_list') }}">List Of All Movies</a></li>
		<li><a href="{{ route('view_formpassword') }}">Change password.</a></li>
		<li><a href="{{ route('user_deleteuser') }}">Delete my account.</a></li>
	</ul>
	<p><a href="signout">Sign out</a></p>
@endsection
