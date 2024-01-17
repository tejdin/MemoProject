<div class="col-md-4 mb-4">
    <div class="card h-100 shadow-sm">
        <!-- Lien englobant pour rendre la carte cliquable -->
        <a href="{{ route('showonememo', ['id' => $memo->id]) }}" class="text-decoration-none text-dark">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">{{$memo->title}}</h5>
                <p class="card-text">{{$memo->content}}</p>

                <!-- Informations sur l'auteur et les dates de création/modification -->
                <p class="card-text mt-auto">
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
            </div>
        </a>

        <!-- Boutons d'action à l'extérieur du lien principal -->
        @if( session()->has('user') && session()->get('user')->username == $memo->user_id)
            <div class="card-footer d-flex justify-content-between">
                <a href="{{route('updateMemo', ['id' => $memo->id])}}" class="btn btn-warning btn-sm">Modifier</a>
                <form action="{{route('deletememo')}}" method="post" class="d-inline">
                    @csrf
                    <input type="hidden" name="id" value="{{$memo->id}}">
                    <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                </form>
                <a href="{{route('updateMemoStatus', ['id' => $memo->id])}}" class="btn btn-primary btn-sm mt-2">{{$memo->is_public ? 'Public' : 'Privé'}}</a>
            </div>
        @endif
    </div>
</div>
