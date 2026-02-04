<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TemplateController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('acceuil');
})->name('home');
    Route::get('/acceuil', [TemplateController::class, 'acceuil'])->name('templates.acceuil');
    Route::get('/templates', [TemplateController::class, 'create'])->name('templates.create');
    
Route::get('/dashboard', function () {

// 1. On récupère l'objet User
    $user = Auth::user(); 

    // 2. On vérifie si l'utilisateur est bien connecté pour éviter une erreur
    if (!$user) {
        return redirect()->route('login');
    }

    // 3. On accède à la relation (SANS $ devant templates)
    $templates = $user->templates;
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route pour le téléchargement (protégée par authentification)
Route::get('/download-template/{id}', [TemplateController::class, 'download'])
    ->name('templates.download')
    ->middleware('auth');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/templates/store', [TemplateController::class, 'store'])->name('templates.store');
    Route::get('/templates/formulaires', [TemplateController::class, 'index'])->name('templates.index');
    Route::get('/templates_personnel', [TemplateController::class, 'edit'])->name('templates.edit');
    Route::get('/Tableau_de_board', [TemplateController::class, 'templatepersonnel'])->name('templates.personnel');


    
    // Si tu as des routes pour éditer ou supprimer plus tard :
    // Route::get('/templates/{template}/edit', [TemplateController::class, 'edit'])->name('templates.edit');
});

require __DIR__.'/auth.php';
