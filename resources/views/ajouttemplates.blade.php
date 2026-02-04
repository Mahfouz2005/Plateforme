<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>HECM - Ajouter un Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/ajouttemplate.css') }}">
</head>
<body>
@extends('layouts.app')
@section('content')
    <div class="container py-5">
        <!-- Lien Retour Moderne -->
        <div class="mb-4 text-center">
            <a href="{{ route('templates.acceuil') }}" class="back-link">
                <i class="bi bi-arrow-left-circle-fill me-2 fs-5"></i>Retour à la bibliothèque
            </a>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-7">
                <div class="card p-4 p-md-5">
                    <div class="card-header border-0 bg-transparent text-center pb-4">
                        <div class="icon-box">
                            <i class="bi bi-cloud-arrow-up-fill"></i>
                        </div>
                        <h2 class="fw-800 h3 mb-1">Publier un Template</h2>
                        <p class="text-muted">Partagez votre travail avec la communauté HECM</p>
                    </div>

                    <div class="card-body">
                        <!-- Alertes -->
                        @if(session('success'))
                            <div class="alert alert-success border-0 rounded-4 p-3 mb-4 d-flex align-items-center" style="background-color: #dcfce7; color: #15803d;">
                                <i class="bi bi-check-circle-fill me-3 fs-4"></i> {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('templates.store') }}" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="row g-4">
                                <!-- Nom & Prénom -->
                                <div class="col-md-6">
                                    <label class="form-label">Nom de l'auteur</label>
                                    <input type="text" name="nom" class="form-control" placeholder="Ex: Dupont" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Prénom de l'auteur</label>
                                    <input type="text" name="prenom" class="form-control" placeholder="Ex: Jean" required>
                                </div>

                                <!-- Description -->
                                <div class="col-12">
                                    <label class="form-label">Description du projet</label>
                                    <textarea name="description" class="form-control" rows="4" placeholder="Qu'est-ce qui rend ce template unique ?" required></textarea>
                                </div>

                                <!-- Accès & Prix -->
                                <div class="col-md-6">
                                    <label class="form-label">Type d'accès</label>
                                    <select name="statut" id="statut" class="form-select" required>
                                        <option value="payant" selected>💎 Premium (Payant)</option>
                                        <option value="gratuit">🎁 Gratuit (Free)</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Prix (FCFA)</label>
                                    <div class="input-group">
                                        <input type="number" id="prix" name="prix" class="form-control" placeholder="3000" required>
                                        <span class="input-group-text border-0 rounded-end-3" style="background: #e2e8f0; font-weight: bold;">CFA</span>
                                    </div>
                                </div>

                                <!-- Catégorie & Langage -->
                                <div class="col-md-6">
                                    <label class="form-label">Catégorie</label>
                                    <select name="categorie" id="categorie" class="form-select">
                                        <option value="Web">🌐 Développement Web</option>
                                        <option value="Mobile">📱 Application Mobile</option>
                                        <option value="Desktop">💻 Logiciel Desktop</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Technologies</label>
                                    <input type="text" name="langage" class="form-control" placeholder="Ex: Laravel, Tailwind..." required>
                                </div>

                                <div class="col-12 py-2"><hr class="opacity-10"></div>

                                <!-- Uploads -->
                                <div class="col-md-6">
                                    <label class="form-label"><i class="bi bi-image me-1"></i> Capture d'écran</label>
                                    <input type="file" name="image" class="form-control" accept="image/*" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label"><i class="bi bi-file-earmark-zip me-1"></i> Fichier Source (ZIP)</label>
                                    <input type="file" name="dossier" class="form-control" required>
                                </div>

                                <!-- Boutons d'action -->
                                <div class="col-12 mt-5">
                                    <div class="d-grid gap-3 d-md-flex justify-content-md-between">
                                        <button type="submit" class="btn btn-submit px-5">
                                            <i class="bi bi-rocket-takeoff-fill me-2"></i>Publier le Template
                                        </button>
                                        <a href="{{ route('templates.personnel') }}" class="btn btn-secondary-custom px-4">
                                            <i class="bi bi-collection-fill me-2"></i>Mon espace personnel
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    const statutSelect = document.getElementById('statut');
    const prixInput = document.getElementById('prix');

    statutSelect.addEventListener('change', function() {
        if (this.value === 'gratuit') {
            prixInput.value = 0;
            prixInput.readOnly = true;
            prixInput.style.opacity = '0.6';
        } else {
            prixInput.value = '';
            prixInput.readOnly = false;
            prixInput.style.opacity = '1';
        }
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>