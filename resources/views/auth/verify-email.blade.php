<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>HECM Templates - Vérification Email</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/verifieemail.css') }}">
</head>

<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            
            <div class="verify-card shadow-sm">
                <div class="text-center">
                    <div class="icon-box">
                        <i class="bi bi-envelope-check"></i>
                    </div>
                    
                    <h2 class="fw-bold h4 mb-3">Vérifiez votre e-mail</h2>
                    
                    <p class="text-muted small mb-4">
                        {{ __('Merci de nous avoir rejoints ! Cliquez sur le lien envoyé par e-mail pour activer votre compte. Si vous n’avez rien reçu, nous vous en renverrons un avec plaisir.') }}
                    </p>
                </div>

                <!-- Message de succès après renvoi -->
                @if (session('status') == 'verification-link-sent')
                    <div class="alert alert-custom-success mb-4 text-center">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        {{ __('Un nouveau lien a été envoyé à votre adresse.') }}
                    </div>
                @endif

                <div class="mt-4">
                    <div class="d-flex flex-column gap-3">
                        <!-- Formulaire Renvoyer l'email -->
                        <form method="POST" action="{{ route('verification.send') }}" class="w-100">
                            @csrf
                            <button type="submit" class="btn btn-gradient w-100">
                                <i class="bi bi-send-fill me-2"></i> {{ __('Renvoyer l’e-mail') }}
                            </button>
                        </form>

                        <!-- Formulaire Déconnexion -->
                        <form method="POST" action="{{ route('logout') }}" class="text-center mt-2">
                            @csrf
                            <button type="submit" class="btn-logout">
                                <i class="bi bi-box-arrow-right me-1"></i> {{ __('Se déconnecter') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="text-center mt-4">
                <p class="text-muted" style="font-size: 0.75rem;">© 2026 HECM Templates — Communauté Dev Bénin</p>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>