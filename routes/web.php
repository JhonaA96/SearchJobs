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
Route::get('/home', 'VacantesController@index')->name('home');
Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/vacantes', [App\Http\Controllers\VacanteController::class, 'index'])->name('vacantes.index');
    Route::get('/vacantes/create', [App\Http\Controllers\VacanteController::class, 'create'])->name('vacantes.create');
    Route::post('/vacantes', [App\Http\Controllers\VacanteController::class, 'store'])->name('vacantes.store');
    
});

Route::get('/vacantes/{vacante}', [App\Http\Controllers\VacanteController::class, 'show'])->name('vacantes.show');
