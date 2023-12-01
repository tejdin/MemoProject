@extends('layouts.mainlayout')

@section('title', 'Update Memo')

@section('content')
    <form action="{{ route('updateMemo')}}" method="POST">
        @csrf <!-- CSRF token for security -->
        @method('PUT') <!-- Specifying the HTTP method to be PUT -->

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $memo->title }}" required>
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" id="content" name="content" rows="3" required>{{ $memo->content }}</textarea>
        </div>
        <input type="hidden" name="id" value={{$memo->id}}>

        <button type="submit" class="btn btn-primary">Update Memo</button>
    </form>

@endsection
