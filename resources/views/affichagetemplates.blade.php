<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>HECM Templates - Bibliothèque</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/affichagetemplate.css') }}">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body>
<!-- NAVBAR -->
@extends('layouts.app')


@section('content')
        <div class="container py-5">
            <div class="text-center mb-5">
                <span class="badge rounded-pill bg-light text-success px-3 py-2 mb-3 border">✨ Bibliothèque Exclusive</span>
                <h1 class="display-5 fw-bold">Découvrez nos <span style="color: var(--primary-green)">Templates</span></h1>
            </div>

            <div class="row g-4">
                @foreach($templates as $template)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="template-card">
                        
                        <!-- Image avec Badge Moderne -->
                        <div class="image-container">
                            @if($template->statut == 'gratuit')
                                <span class="badge-status badge-free">
                                    <i class="bi bi-gift-fill"></i> Gratuit
                                </span>
                            @else
                                <span class="badge-status badge-premium">
                                    <i class="bi bi-gem"></i> Premium
                                </span>
                            @endif

                            <img src="{{ $template->image ? asset('storage/' . $template->image) : 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&q=80&w=400' }}" class="template-img" alt="Template">
                        </div>

                        <div class="card-body p-4 d-flex flex-column">
                            <div class="d-flex justify-content-between align-items-top mb-3">
                                <span class="category-pill">{{ $template->categorie }}</span>
                                
                                <!-- Prix moderne -->
                                <div class="price-container">
                                    @if($template->statut == 'gratuit')
                                        <span class="price-tag price-free">Offert</span>
                                    @else
                                        <span class="price-tag price-premium">{{ number_format($template->prix, 0, ',', ' ') }}</span>
                                        <span class="currency">FCFA</span>
                                    @endif
                                </div>
                            </div>

                            <h5 class="fw-bold mb-2 text-dark">{{ $template->nom }}</h5>
                            
                            <div class="d-flex gap-3 mb-3">
                                <small class="text-muted"><i class="bi bi-cpu me-1"></i> {{ $template->langage }}</small>
                                <small class="text-muted"><i class="bi bi-patch-check-fill text-primary"></i> Vérifié</small>
                            </div>
                            
                            <p class="text-secondary small mb-4 flex-grow-1">
                                {{ \Illuminate\Support\Str::limit($template->description, 90) }}
                            </p>

                            <div class="mt-auto">
                                @if($template->statut == 'gratuit')
                                    <a href="#" class="btn btn-gradient w-100"><i class="bi bi-download me-2" dowload></i>Obtenir gratuitement</a>
                                @else
                                    <a href="#" class="btn btn-buy w-100"><i class="bi bi-cart-check-fill me-2"></i>Acheter maintenant</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>