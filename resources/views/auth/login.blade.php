<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>HECM Templates - Connexion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5 col-xl-4">
            
            <!-- Retour accueil -->
            <div class="mb-4 text-center">
                <a href="/" class="back-link">
                    <i class="bi bi-arrow-left me-1"></i> Retour à l'accueil
                </a>
            </div>

            <!-- Card de connexion -->
            <div class="login-card">
                <div class="text-center mb-4">
                    <div class="logo-icon mb-3">
                        <i class="bi bi-layers-half" style="font-size: 2rem;"></i>
                    </div>
                    <h2 class="fw-bold h4">Connexion</h2>
                    <p class="text-muted small">Heureux de vous revoir sur HECM !</p>
                </div>

                @if (session('status'))
                    <div class="alert alert-success border-0 small mb-4" style="background-color: rgba(34, 197, 94, 0.1); color: #166534;">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email -->
                    <div class="mb-3">
                        <label class="form-label">Adresse Email</label>
                        <input type="email"
                               name="email"
                               value="{{ old('email') }}"
                               required autofocus
                               class="form-control"
                               placeholder="nom@exemple.com">
                        @error('email')
                            <small class="text-danger mt-1 d-block" style="font-size: 0.75rem;">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <div class="d-flex justify-content-between">
                            <label class="form-label">Mot de passe</label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="small text-primary-custom fw-normal" style="font-size: 0.75rem;">Oublié ?</a>
                            @endif
                        </div>
                        <input type="password"
                               name="password"
                               required
                               class="form-control"
                               placeholder="••••••••">
                        @error('password')
                            <small class="text-danger mt-1 d-block" style="font-size: 0.75rem;">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="mb-4 form-check">
                        <input type="checkbox" name="remember" class="form-check-input" id="remember">
                        <label class="form-check-label text-muted small" for="remember">
                            Se souvenir de moi
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-gradient w-100 mb-2">
                        Se connecter
                    </button>
                </form>

                <!-- Register Link -->
                <div class="text-center mt-4">
                    <p class="text-muted small mb-0">
                        Pas encore de compte ? 
                        <a href="{{ route('register') }}" class="text-primary-custom">
                            Créer un compte
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