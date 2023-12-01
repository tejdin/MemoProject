<div class="col-md-4 mb-4">
    <div class="card h-100 shadow-sm"> <!-- Ajout d'ombre pour un effet moderne -->
        <div class="card-body d-flex flex-column"> <!-- Flex pour une meilleure organisation -->
            <h5 class="card-title">{{$memo->title}}</h5>
            <p class="card-text">{{$memo->content}}</p>

            <!-- Informations sur l'auteur et les dates de création/modification -->
            <p class="card-text mt-auto"> <!-- mt-auto pour aligner en bas -->
                <small class="text-muted">
                    <i class="fas fa-user"></i> Créé par
                    <span class="badge badge-primary">{{$memo->user->username}}</span>
                    <i class="fas fa-calendar-alt"></i> le
                    <span class="badge badge-info">{{$memo->created_at->format('d M Y')}}</span>
                    <br>
                    <i class="fas fa-clock"></i> Modifié le
                    <span class="badge badge-info">{{$memo->updated_at->format('d M Y')}}</span>
                </small>
            </p>

            @if( session()->has('user') && session()->get('user')->id == $memo->user_id)
                <div class="d-flex justify-content-between mt-3"> <!-- Flexbox pour aligner les boutons -->
                    <a href="{{route('updateMemo', ['id' => $memo->id])}}" class="btn btn-warning btn-sm">Modifier</a>
                    <form action="{{route('deletememo')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$memo->id}}">
                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                    </form>
                </div>
                <a href('{{route('updateMemoStatus')}}' class="btn btn-primary btn-sm mt-2">{{$memo->is_public}}</a>
            @endif
        </div>
    </div>
</div>
