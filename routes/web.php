<?php

use Illuminate\Support\Facades\Route;

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
Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/vacantes', [App\Http\Controllers\VacanteController::class, 'index'])->name('vacantes.index');
    Route::get('/vacantes/create', [App\Http\Controllers\VacanteController::class, 'create'])->name('vacantes.create');
    Route::post('/vacantes', [App\Http\Controllers\VacanteController::class, 'store'])->name('vacantes.store');
    Route::delete('/vacantes/{vacante}', [App\Http\Controllers\VacanteController::class, 'destroy'])->name('vacantes.destroy');
    Route::get('/vacantes/{vacante}/edit', [App\Http\Controllers\VacanteController::class, 'edit'])->name('vacantes.edit');
    Route::put('/vacantes/{vacante}', [App\Http\Controllers\VacanteController::class, 'update'])->name('vacantes.update');


    Route::post('/vacantes/{vacante}', [App\Http\Controllers\VacanteController::class, 'estado'])->name('vacantes.estado');
    Route::get('/notificaciones', [App\Http\Controllers\NotificacionesController::class, '__invoke'])->name('notificaciones');
});

Route::get('/busqueda/buscar', [App\Http\Controllers\VacanteController::class, 'resultados'])->name('vacantes.resultados');
Route::post('/busqueda/buscar', [App\Http\Controllers\VacanteController::class, 'buscar'])->name('vacantes.buscar');
Route::get('/vacantes/{vacante}', [App\Http\Controllers\VacanteController::class, 'show'])->name('vacantes.show');
Route::get('/candidatos/{id}', [App\Http\Controllers\CandidatoController::class, 'index'])->name('candidatos.index');
Route::post('/candidatos/store', [App\Http\Controllers\CandidatoController::class, 'store'])->name('candidatos.store');
Route::get('/', [App\Http\Controllers\InicioController::class, '__invoke'])->name('Inicio');
Route::get('/categorias/{categoria}', [App\Http\Controllers\CategoriaController::class, 'show'])->name('categorias.show');