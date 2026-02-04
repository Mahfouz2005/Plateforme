<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>HECM Templates - Réinitialisation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/forgotpass.css') }}">
</head>

<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5 col-xl-4">
            
            <!-- Lien Retour -->
            <div class="mb-4 text-center">
                <a href="{{ route('login') }}" class="back-link">
                    <i class="bi bi-arrow-left me-1"></i> Retour à la connexion
                </a>
            </div>

            <!-- Card Principale -->
            <div class="login-card">
                <div class="text-center mb-4">
                    <div class="icon-box">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                    <h2 class="fw-bold h4">Mot de passe oublié ?</h2>
                    <p class="text-muted small mt-2">
                        Indiquez votre adresse e-mail et nous vous enverrons un lien de réinitialisation sécurisé.
                    </p>
                </div>

                <!-- Status de la Session (Succès) -->
                @if (session('status'))
                    <div class="alert alert-success border-0 small mb-4" style="background-color: rgba(34, 197, 94, 0.1); color: #166534;">
                        <i class="bi bi-check-circle-fill me-2"></i> {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="mb-4">
                        <label class="form-label" for="email">Votre Email</label>
                        <input id="email" 
                               type="email" 
                               name="email" 
                               class="form-control" 
                               value="{{ old('email') }}" 
                               required autofocus 
                               placeholder="nom@exemple.com">
                        
                        @error('email')
                            <small class="text-danger mt-1 d-block" style="font-size: 0.75rem;">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-gradient w-100">
                        Envoyer le lien
                    </button>
                </form>
            </div>

            <!-- Footer -->
            <div class="text-center mt-4">
                <p class="text-muted" style="font-size: 0.75rem;">© 2026 HECM Templates • Support Technique</p>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>