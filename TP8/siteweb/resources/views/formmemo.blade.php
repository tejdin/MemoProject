@extends('layouts/mainlayout')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form action="{{route('formmemoadd')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="memoSubject">Subject</label>
                    <input type="text" name="title" class="form-control" id="memoSubject" placeholder="Enter subject">
                    <label for="memoBody">Body</label>
                    <textarea class="form-control" name="content" id="memoBody" rows="3"></textarea>
                </div>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <a href="{{route('account')}}" class="btn btn-primary mt-2">Back to Account</a>
        </div>
    </div>
</div>

@endsection
