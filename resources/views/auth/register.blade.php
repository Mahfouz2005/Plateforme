<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>HECM Templates - Inscription</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>

<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-5 col-xl-4">
            
            <!-- Retour accueil -->
            <div class="mb-4 text-center">
                <a href="/" class="back-link">
                    <i class="bi bi-arrow-left me-1"></i> Retour au site
                </a>
            </div>

            <!-- Card d'inscription -->
            <div class="register-card">
                <div class="text-center mb-4">
                    <div class="icon-box">
                        <i class="bi bi-person-plus-fill"></i>
                    </div>
                    <h2 class="fw-bold h4">Créer un compte</h2>
                    <p class="text-muted small">Rejoignez la communauté HECM Templates</p>
                </div>

                @if (session('status'))
                    <div class="alert alert-success border-0 small mb-4" style="background-color: rgba(34, 197, 94, 0.1); color: #166534;">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Nom -->
                    <div class="mb-3">
                        <label class="form-label">Nom complet</label>
                        <input type="text"
                               name="name"
                               value="{{ old('name') }}"
                               required autofocus
                               class="form-control"
                               placeholder="Ex: Jean Dupont">
                        @error('name')
                            <small class="text-danger mt-1 d-block" style="font-size: 0.75rem;">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label class="form-label">Adresse Email</label>
                        <input type="email"
                               name="email"
                               value="{{ old('email') }}"
                               required
                               class="form-control"
                               placeholder="nom@exemple.com">
                        @error('email')
                            <small class="text-danger mt-1 d-block" style="font-size: 0.75rem;">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Mot de passe -->
                    <div class="mb-3">
                        <label class="form-label">Mot de passe</label>
                        <input type="password"
                               name="password"
                               required
                               class="form-control"
                               placeholder="Minimum 8 caractères">
                        @error('password')
                            <small class="text-danger mt-1 d-block" style="font-size: 0.75rem;">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Confirmer mot de passe -->
                    <div class="mb-4">
                        <label class="form-label">Confirmer le mot de passe</label>
                        <input type="password"
                               name="password_confirmation"
                               required
                               class="form-control"
                               placeholder="Répétez votre mot de passe">
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-gradient w-100 mb-2">
                        Créer mon compte
                    </button>
                </form>

                <!-- Login Link -->
                <div class="text-center mt-4">
                    <p class="text-muted small mb-0">
                        Déjà inscrit ? 
                        <a href="{{ route('login') }}" class="text-primary-custom">
                            Se connecter
                        </a>
                    </p>
                </div>
            </div>

            <!-- Footer simple -->
            <div class="text-center mt-4">
                <p class="text-muted" style="font-size: 0.75rem;">© 2026 HECM Templates • Plateforme Béninoise</p>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>