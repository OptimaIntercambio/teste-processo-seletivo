<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\{
    PaisController,
    IdiomaController
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Rotas que requerem autenticação
Route::middleware(['auth'])->group(function() {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::prefix('admin')->name('admin.')->group(function() {
        Route::resource('paises', PaisController::class);
        Route::resource('idiomas', IdiomaController::class);
    });
});

require __DIR__.'/auth.php';
