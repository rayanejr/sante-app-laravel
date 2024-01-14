<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ActeSanteController;
use App\Http\Controllers\PaysController;
use App\Http\Controllers\RecommandationController;
use App\Http\Controllers\DeplacementController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

// Route de déconnexion
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Groupes de routes avec vérification de l'email
Route::middleware(['auth', 'verified'])->group(function () {
    // Tableau de bord pour les utilisateurs authentifiés
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/dashboard/{countryName}', [PaysController::class, 'showByCountryName']);
    Route::post('/estimation-co2', [PaysController::class, 'estimationEmpreinteCo2'])->name('estimation_co2');



    
    // Routes réservées aux administrateurs
    Route::middleware('admin')->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
        
        // Exemple de routes CRUD pour les administrateurs
        Route::resource('admin/actes_sante', ActeSanteController::class);
        Route::resource('admin/pays', PaysController::class);
        Route::resource('admin/recommandations', RecommandationController::class);
        Route::resource('admin/deplacements', DeplacementController::class);
        Route::resource('admin/users', UserController::class);
    });
});

// Inclusion des routes d'authentification
require __DIR__.'/auth.php';