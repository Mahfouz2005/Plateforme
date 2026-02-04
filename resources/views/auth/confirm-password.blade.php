<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>HECM Templates - Zone Sécurisée</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/confirmpass.css') }}">
</head>

<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5 col-xl-4">
            
            <!-- Card Principale -->
            <div class="secure-card text-center">
                
                <div class="badge-secure">
                    <i class="bi bi-shield-check me-1"></i> Zone Sécurisée
                </div>

                <div class="icon-box">
                    <i class="bi bi-lock-fill"></i>
                </div>

                <h2 class="fw-bold h4">Confirmer l'accès</h2>
                <p class="text-muted small mt-2 mb-4">
                    Cette action est sensible. Veuillez confirmer votre mot de passe pour continuer.
                </p>

                <form method="POST" action="{{ route('password.confirm') }}" class="text-start">
                    @csrf

                    <!-- Password -->
                    <div class="mb-4">
                        <label class="form-label" for="password">Votre Mot de passe</label>
                        <input id="password" 
                               type="password" 
                               name="password" 
                               class="form-control" 
                               required 
                               autocomplete="current-password"
                               placeholder="••••••••">
                        
                        @error('password')
                            <small class="text-danger mt-1 d-block" style="font-size: 0.75rem;">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-gradient w-100">
                        <i class="bi bi-shield-lock me-2"></i> Confirmer l'accès
                    </button>
                </form>

                <div class="mt-4">
                    <a href="javascript:history.back()" class="text-decoration-none text-muted small hover-green">
                        <i class="bi bi-arrow-left me-1"></i> Retourner en arrière
                    </a>
                </div>
            </div>

            <!-- Footer -->
            <div class="text-center mt-4">
                <p class="text-muted" style="font-size: 0.75rem;">© 2026 HECM Templates — Protection des données</p>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>