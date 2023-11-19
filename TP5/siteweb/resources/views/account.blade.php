<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="my-4">Bienvenue, <span id="username">{{session()->get('user')->getusername()}}</span></h2>
            <form action="/logout" method="post">
                @csrf
                <input  type="hidden" name="_token" value="{{csrf_token()}}">
                <button type="submit" class="btn btn-danger">Se Déconnecter</button>
            </form>
            <a href="/formpassword" class="btn btn-primary mt-2">Changer le Mot de Passe</a>
            @if(session("succes"))
                <div class="alert alert-success mt-3">
                    {{ session("succes") }}
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Bootstrap JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
