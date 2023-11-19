
@extends('layouts.mainlayout')

@section('title', 'Mon Compte')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h2 class="my-4">Bienvenue, <span id="username">{{session()->get('user')->getusername()}}</span></h2>
            <form action="{{route('logout')}}" method="post">
                @csrf
                <input  type="hidden" name="_token" value="{{csrf_token()}}">
                <button type="submit" class="btn btn-danger">Se Déconnecter</button>
            </form>
            <a href="{{route('formpassword')}}" class="btn btn-primary mt-2">Changer le Mot de Passe</a>
        </div>
    </div>
</div>

@endsection
