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

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    // Routes CRUD pour les modèles
    Route::resource('actes_sante', ActeSanteController::class);
    Route::resource('pays', PaysController::class);
    Route::resource('recommandations', RecommandationController::class);
    Route::resource('deplacements', DeplacementController::class);
    Route::resource('users', UserController::class); // Assurez-vous que cette route est sécurisée et appropriée
});

require __DIR__.'/auth.php';
