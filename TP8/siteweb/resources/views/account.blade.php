
@extends('layouts.mainlayout')

@section('title', 'Mon Compte')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h2 class="my-4">Bienvenue, <span id="username">{{session()->get('user')->username}}</span></h2>

            <a href="{{route('formmemo')}}" class="btn btn-primary mt-2">Ajouter un Mémo</a>
            <a href="{{route('showmemos')}}" class="btn btn-primary mt-2">Liste des Mémos</a>
            <a href="{{route('formpassword')}}" class="btn btn-primary mt-2">Changer le Mot de Passe</a>
            <br>
            <br>
            <br>

            <form action="{{route('logout')}}" method="get">
                @csrf
                <input  type="hidden" name="_token" value="{{csrf_token()}}">
                <button type="submit" class="btn btn-danger">Se Déconnecter</button>
            </form>
        </div>
    </div>
</div>

@endsection
