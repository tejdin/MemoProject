@extends('layouts.mainlayout') <!-- Étendre le layout principal de votre application -->

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Détails du Mémo</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">{{$memo->title}}</h5>
                        <p class="card-text">{{$memo->content}}</p>
                        <hr>
                        <p>
                            <i class="fas fa-user"></i> <strong>Auteur :</strong> {{$memo->user->username}} <br>
                            <i class="fas fa-calendar-plus"></i> <strong>Créé le :</strong> {{$memo->created_at->format('d M Y')}} <br>
                            <i class="fas fa-edit"></i> <strong>Modifié le :</strong> {{$memo->updated_at->format('d M Y')}}
                        </p>
                        @if( session()->has('user') && session()->get('user')->username == $memo->user_id)
                            <div class="btn-group">
                                <a href="{{route('updateMemo', ['id' => $memo->id])}}" class="btn btn-warning">Modifier</a>
                                <form action="{{route('deletememo')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$memo->id}}">
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
