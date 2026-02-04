<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HECM Templates - Dashboard</title>
    
    <!-- Polices et Icones -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/templatepersonnel.css') }}">
</head>
<body>
<!-- NAVBAR -->
@extends('layouts.app')

    <main class="py-5">
        @section('content')
            <div class="container">
            
                <!-- SECTION 2 : MES TEMPLATES -->
                <div class="row align-items-center mb-4">
                    <div class="col-md-8">
                        <h2 class="display-6 mb-1">Mes <span style="color: var(--primary-green)">Templates</span></h2>
                        <p class="text-light-custom">Gérez vos publications et vos ventes.</p>
                    </div>
                    <div class="col-md-4 text-md-end">
                        <a href="{{ route('templates.index') }}" class="btn btn-gradient">
                            <i class="bi bi-plus-circle me-2"></i> Publier un template
                        </a>
                    </div>
                </div>

                @if($personneles->isEmpty())
                    <div class="soft-card p-5 text-center bg-white">
                        <div class="py-4">
                            <i class="bi bi-folder-x display-1 text-light"></i>
                            <h4 class="mt-4">Aucun template publié</h4>
                            <p class="text-light-custom mb-4">Commencez par partager votre première création.</p>
                            <a href="{{ route('templates.create') }}" class="btn btn-outline-success rounded-pill px-4">Voir les templates disponibles</a>
                        </div>
                    </div>
                @else
                    <div class="row g-4">
                        @foreach($personneles as $personnel)
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="soft-card h-100 flex-column d-flex">
                                    <!-- Image & Badge -->
                                    <div class="img-wrapper position-relative overflow-hidden border-bottom">
                                        @if($personnel->image)
                                            <img src="{{ asset('storage/' . $personnel->image) }}" alt="{{ $personnel->nom }}" class="w-100 h-100 object-fit-cover transition-img">
                                        @else
                                            <div class="d-flex align-items-center justify-content-center h-100 bg-light text-muted">
                                                <i class="bi bi-image fs-1"></i>
                                            </div>
                                        @endif
                                        <div class="position-absolute top-0 start-0 m-3">
                                            <span class="{{ $personnel->statut == 'payant' ? 'badge-soft-paid' : 'badge-soft-free' }} shadow-sm">
                                                <i class="bi {{ $personnel->statut == 'payant' ? 'bi-cash-stack' : 'bi-gift' }} me-1"></i>
                                                {{ ucfirst($personnel->statut) }}
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Contenu -->
                                    <div class="p-4 flex-grow-1">
                                        <div class="d-flex justify-content-between align-items-start mb-2">
                                            <h5 class="fw-bold mb-0 text-truncate" style="max-width: 65%;">{{ $personnel->nom }}</h5>
                                            <div class="price-text">{{ number_format($personnel->prix, 0, ',', ' ') }} <small class="fs-6">FCFA</small></div>
                                        </div>
                                        <p class="text-light-custom mb-3" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; height: 2.8rem;">
                                            {{ $personnel->description }}
                                        </p>
                                        <div class="d-flex flex-wrap gap-2">
                                            <span class="tech-tag"><i class="bi bi-tag me-1"></i>{{ $personnel->categorie }}</span>
                                            <span class="tech-tag"><i class="bi bi-code-slash me-1"></i>{{ $personnel->langage }}</span>
                                        </div>
                                    </div>

                                    <!-- Actions -->
                                    <div class="px-4 py-3 bg-light border-top d-flex justify-content-between align-items-center">
                                        <a href="#" class="btn btn-sm fw-bold p-0 text-decoration-none" style="color: var(--primary-green);">
                                            Détails <i class="bi bi-arrow-right ms-1"></i>
                                        </a>
                                        <div class="d-flex gap-2">
                                            <a href="#" class="btn-action-edit" title="Modifier">
                                                <i class="bi bi-pencil-fill"></i>
                                            </a>
                                            <form action="#" method="POST" onsubmit="return confirm('Supprimer ce template ?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-action-delete" title="Supprimer">
                                                    <i class="bi bi-trash3-fill"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            @endsection
        </div>
    </main>
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>