@extends('layouts.mainLayout')

@section('title','Movie list')


@section('content')
	<h1>Movie list</h1>
	<table>
		<thead>
			<tr>
				<th>Title</th>
				<th>Type</th>
				<th>Realisator</th>
				<th>Date</th>
				<th>Synopsis</th>
				<th>user</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach($movies as $movie)
				<tr>
					<td>{{ $movie->title }}</td>
					<td>{{ $movie->type }}</td>
					<td>{{ $movie->realisator }}</td>
					<td>{{ $movie->date }}</td>
					<td>{{ $movie->synopsis }}</td>
					<td>{{ $movie->login }}</td>
					<td>
						@if($movie->login == session('user')->login)
							<a href="{{ route('movie_delete', $movie->id) }}">Delete</a>
						@endif
					<a href="{{ route('movie_one', $movie->id) }}">show</a>
				</tr>
			@endforeach
		</tbody>
	</table>

	<a href="{{ route('view_formmovie') }}">Add a movie</a>

	<p><a href="{{ route('view_account') }}">Back to my account</a></p>

@endsection
