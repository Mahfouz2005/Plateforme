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
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
   
</head>
<body>
@extends('layouts.app')
    @section('content')

        <main class="py-5">
            <div class="container">
                
                <!-- SECTION 1 : BIENVENUE -->
                <div class="dashboard-card p-4 p-md-5 mb-5">
                    <div class="row align-items-center">
                        <div class="col-lg-8">
                            <div class="welcome-icon d-none d-md-flex">
                                <i class="bi bi-stars"></i>
                            </div>
                            <div class="status-badge mb-3">
                                <span class="bg-success rounded-circle" style="width: 8px; height: 8px;"></span>
                                {{ Auth::user()->name }} — Session active
                            </div>
                            <h1 class="display-5 fw-bold mb-3">Ravi de vous revoir !</h1>
                            <p class="text-light-custom fs-5 mb-4">
                                Tu es connecté à ton espace HECM Templates. C'est ici que tu peux gérer tes ressources et suivre tes activités.
                            </p>
                            <div class="d-flex flex-wrap gap-3 justify-content-center justify-content-md-start">
                                <!-- Bouton 1 -->
                                <a href="{{ route('templates.acceuil') }}" class="btn btn-gradient px-4 rounded-pill">
                                    <i class="bi bi-house-door me-2"></i> Explorer le site
                                </a>

                                <!-- Bouton 2 -->
                                <a href="{{ route('profile.edit') }}" class="btn btn-gradient px-4 rounded-pill">
                                    <i class="bi bi-person-gear me-2"></i> Votre profil
                                </a>

                                <a href="{{ route('templates.edit') }}" class="btn btn-gradient">
                                    <i class="bi bi-plus-circle me-2"></i> Vos templates
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 d-none d-lg-block text-end">
                            <i class="bi bi-person-check" style="font-size: 8rem; color: rgba(34, 197, 94, 0.05);"></i>
                        </div>
                    </div>
                </div>
            @endsection        
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>