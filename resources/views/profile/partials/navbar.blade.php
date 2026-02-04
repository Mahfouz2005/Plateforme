<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/acceuil.css') }}">

</head>
<body>
   <!-- resources/views/partials/navbar.blade.php -->
<nav class="navbar navbar-expand-lg navbar-light sticky-top navbar-blur" style="background: rgba(255,255,255,0.9); backdrop-filter: blur(10px); border-bottom: 1px solid #f1f5f9;">
    <div class="container">
        <a class="navbar-brand fw-bold text-dark" href="/">
            <i class="bi bi-layers-half text-success fs-3"></i> HECM Templates
        </a>

        <!-- CORRECTION ICI : data-bs-toggle="collapse" -->
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-auto gap-lg-3">
                <li class="nav-item"><a class="nav-link fw-bold" href="/">Accueil</a></li>
                <li class="nav-item"><a class="nav-link fw-bold" href="{{ route('templates.create') }}">Bibliothèque</a></li>
            </ul>

            <div class="d-flex gap-2 ms-lg-4 align-items-center">
                @guest
                    <a class="btn btn-link text-decoration-none text-dark fw-bold" href="{{ route('login') }}">Connexion</a>
                    <a class="btn btn-success rounded-pill px-4" href="{{ route('register') }}">S'inscrire</a>
                @endguest

                @auth
                    <div class="dropdown">
                        <a class="btn btn-white border shadow-sm rounded-pill dropdown-toggle d-flex align-items-center gap-2 px-3" 
                           href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="bg-success rounded-circle d-flex align-items-center justify-content-center text-white" style="width: 32px; height: 32px;">
                                <i class="bi bi-person-fill"></i>
                            </div>
                            <span class="fw-bold text-dark">{{ Auth::user()->nom }}</span>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 rounded-4" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item py-2" href="{{ route('profile.edit') }}"><i class="bi bi-person me-2"></i>Mon Profil</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('templates.create') }}"><i class="bi bi-collection me-2"></i>Mes Templates</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger fw-bold py-2">
                                        <i class="bi bi-box-arrow-right me-2"></i> Déconnexion
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</nav>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>