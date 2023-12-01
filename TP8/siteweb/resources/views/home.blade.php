@extends('layouts.mainlayout')

@section('title', 'Home')
<!-- SHOW PUBLIC MEMOS -->
@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Wellcome,</h1>
        <div class="row">
            @foreach ($memos as $memo)
                @include('shared/memocard', ['memo' => $memo])
            @endforeach
        </div>
    </div>
@endsection
