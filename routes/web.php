<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\ProdutoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('produtos')->group(function () {
        Route::get('', [ProdutoController::class, 'index'])->name('produto.index');
        Route::get('cadastro', [ProdutoController::class, 'create'])->name('produto.create');
        Route::get('editar/{id}', [ProdutoController::class, 'edit'])->name('produto.edit');
        Route::post('cadastro', [ProdutoController::class, 'store'])->name('produto.store');
        Route::post('editar/{id}', [ProdutoController::class, 'update'])->name('produto.update');
        Route::delete('delete/{id}', [ProdutoController::class, 'destroy'])->name('produto.delete');
    });
});

require __DIR__ . '/auth.php';
