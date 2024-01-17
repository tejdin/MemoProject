@extends('layouts.mainlayout')

@section('title', 'Login')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="login-container">
                <form action="{{route('auth')}}" method="post">
                    @csrf
                    <h3 class="text-center">Login</h3>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </form>

</div>
        </div>
    </div>
</div>
@endsection

<!-- Bootstrap JS, Popper.js, and jQuery -->

