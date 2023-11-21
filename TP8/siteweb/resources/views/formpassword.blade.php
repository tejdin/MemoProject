@extends('layouts.mainlayout')

@section('title', 'Change Password')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-body">
                    <h3 class="card-title text-center">Update Password</h3>
                    <form action="{{route('changepassword')}}" method="post">
                        @csrf
                        <!-- You might want to include a hidden field for a reset token -->
                        <div class="form-group">
                            <label for="oldpassword">Old Password</label>
                            <input type="password" class="form-control" id="oldpassword" name="oldpassword" required>
                        </div>
                        <div class="form-group">
                            <label for="newPassword">New Password</label>
                            <input type="password" class="form-control" id="newpassword" name="newpassword" required>
                        </div>
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <button type="submit" class="btn btn-primary btn-block">Update Password</button>
                    </form>
                    <a href="{{route('account')}}" class="btn btn-primary mt-2">Back to Account</a>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
