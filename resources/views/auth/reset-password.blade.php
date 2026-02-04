<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>HECM Templates - Nouveau mot de passe</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Fonts : Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/resetpass.css') }}">
</head>

<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-5 col-xl-4">
            
            <!-- Card de réinitialisation -->
            <div class="reset-card">
                <div class="text-center mb-4">
                    <div class="icon-box">
                        <i class="bi bi-arrow-repeat"></i>
                    </div>
                    <h2 class="fw-bold h4">Nouveau mot de passe</h2>
                    <p class="text-muted small">Sécurisez votre compte avec un nouveau mot de passe.</p>
                </div>

                <form method="POST" action="{{ route('password.store') }}">
                    @csrf

                    <!-- Password Reset Token (Invisible mais nécessaire) -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Email Address -->
                    <div class="mb-3">
                        <label class="form-label">Adresse Email</label>
                        <input type="email" 
                               name="email" 
                               class="form-control" 
                               value="{{ old('email', $request->email) }}" 
                               required autofocus 
                               readonly>
                        @error('email')
                            <small class="text-danger mt-1 d-block">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label class="form-label">Nouveau mot de passe</label>
                        <input type="password" 
                               name="password" 
                               class="form-control" 
                               required 
                               placeholder="••••••••">
                        @error('password')
                            <small class="text-danger mt-1 d-block">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-4">
                        <label class="form-label">Confirmer le mot de passe</label>
                        <input type="password" 
                               name="password_confirmation" 
                               class="form-control" 
                               required 
                               placeholder="••••••••">
                        @error('password_confirmation')
                            <small class="text-danger mt-1 d-block">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-gradient w-100">
                        Réinitialiser le mot de passe
                    </button>
                </form>
            </div>

            <!-- Footer -->
            <div class="text-center mt-4">
                <p class="text-muted small">© 2026 HECM Templates</p>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>