<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title> <!-- Ajout d'un titre par défaut -->
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Déplacement du CSS dans le head pour une meilleure organisation */
        body {
            padding-top: 56px; /* Ajustement pour le menu fixé en haut */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }
        .fixed-top {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000; /* Pour rester au-dessus des autres éléments */
        }
        .login-container {
            padding: 20px;
            border-radius: 5px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .message {
            position: absolute;
            bottom: 0;
            right: 0;
            margin: 20px;
        }
    </style>
</head>
<body>
<!-- menu -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a class="navbar-brand" href="{{ route('home') }}">MemoApp</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup"
            aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- menu items -->
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <!-- menu item -->
            <a class="nav-item nav-link" href="{{ route('home') }}">Home</a>
            <!-- menu item -->
            @if(session()->has('user'))

            <a class="nav-item nav-link" href="{{ route('account') }}">Account</a>
            <!-- menu item -->
            <a class="nav-item nav-link" href="{{ route('formmemo') }}">Add Memo</a>
            <!-- menu item -->
            <a class="nav-item nav-link" href="{{ route('logout') }}">Logout</a>
            @else
            <a class="nav-item nav-link" href="{{ route('login') }}">Login</a>
                <a class="nav-item nav-link" href="{{ route('register') }}">Register</a>
            @endif
        </div>
    </div>
</nav>

<div class="container">
    @yield('content') <!-- Utilisation de yield au lieu de section/show pour une meilleure clarté -->
</div>

@include('shared.message') <!-- Assurez-vous que ce fichier partial existe -->

<!-- Bootstrap JS, Popper.js, et jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
