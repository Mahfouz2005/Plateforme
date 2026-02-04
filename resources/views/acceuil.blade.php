<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HECM Templates - Accueil</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Fichier CSS -->
    <link rel="stylesheet" href="{{ asset('css/acceuil.css') }}">
</head>

<body>

<!-- NAVBAR -->
  <div class="container">
  @extends('layouts.app')
    <!-- HERO -->
    @section('content')
    <header class="container py-5">
        <div class="row align-items-center g-5 py-5">
            <div class="col-lg-7 text-center text-lg-start">
                <span class="badge rounded-pill badge-soft-paid mb-3 px-3 py-2 border border-success-subtle">
                    👋 Bienvenue sur la plateforme HECM
                </span>
                <h1 class="display-3 fw-800 mb-4" style="letter-spacing: -2px; line-height: 1.1;">
                    Récupérez les meilleurs <span class="text-primary-green">Templates</span> pour vos projets
                </h1>
                <p class="text-muted fs-5 mb-5 pe-lg-5">
                    Rejoignez la plus grande bibliothèque de ressources au Bénin. Apprenez, partagez et collaborez ensemble.
                </p>
                <div class="d-flex flex-wrap justify-content-center justify-content-lg-start gap-3">
                    <a href="{{ route('templates.create') }}" class="btn btn-indigo rounded-pill px-5 py-3 shadow-lg">
                        Explorer les templates
                    </a>
                    <a href="{{ route('templates.index') }}" class="btn btn-outline-dark rounded-pill px-4 py-3 fw-bold">
                        <i class="bi bi-plus-circle me-2"></i> Publier une ressource
                    </a>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="soft-card p-4 p-md-5">
                    <h6 class="fw-bold text-uppercase small mb-4 text-primary">⭐ Ressources Populaires</h6>
                    <div class="d-grid gap-3">
                        <div class="p-3 bg-light rounded-4 d-flex justify-content-between align-items-center">
                            <span class="fw-bold">LaraSaaS Dashboard</span>
                            <span class="badge badge-soft-paid">Premium</span>
                        </div>
                        <div class="p-3 bg-light rounded-4 d-flex justify-content-between align-items-center">
                            <span class="fw-bold">Blog Starter Kit</span>
                            <span class="badge bg-white text-secondary border">Gratuit</span>
                        </div>
                    </div>
                    <a href="{{ route('templates.index') }}" class="btn btn-link w-100 mt-4 text-decoration-none fw-bold text-success">
                        Voir tout <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- FEATURES -->
    <section class="container py-5">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="soft-card p-4 h-100">
                    <div class="feature-icon"><i class="bi bi-lightning-charge-fill fs-3"></i></div>
                    <h5 class="fw-bold">Vitesse</h5>
                    <p class="text-muted">Des boîtes optimisées pour un déploiement instantané.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="soft-card p-4 h-100">
                    <div class="feature-icon text-primary"><i class="bi bi-code-square fs-3"></i></div>
                    <h5 class="fw-bold">Qualité</h5>
                    <p class="text-muted">Un code propre et structuré, facile à modifier.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="soft-card p-4 h-100">
                    <div class="feature-icon text-warning"><i class="bi bi-shield-check fs-3"></i></div>
                    <h5 class="fw-bold">Vérifié</h5>
                    <p class="text-muted">Tous les templates sont testés par notre équipe.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-white border-top py-5 mt-5">
        <div class="container text-center">
            <p class="text-muted mb-0 small">© 2026 HECM Templates. Tous droits réservés.</p>
        </div>
    </footer>
  </div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>