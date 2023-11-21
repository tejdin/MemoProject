@extends('layouts.mainlayout')

@section('title', 'Memo List')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Memo List</h1>
        <div class="row">
            @foreach ($memos as $memo)
             @include('shared/memocard', ['memo' => $memo])
            @endforeach
        </div>
        <a href="{{route('account')}}" class="btn btn-primary mt-2">Back to Account</a>
    </div>
@endsection
