<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HolaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hola', [HolaController::class, 'index'])->name('saludos.index');
Route::post('/saludar', [HolaController::class, 'saludar'])->name('saludos.store');
Route::delete('/saludos/{id}', [HolaController::class, 'destroy'])->name('saludos.destroy');
Route::get('/saludos/{id}/edit', [HolaController::class, 'edit'])->name('saludos.edit');
Route::put('/saludos/{id}', [HolaController::class, 'update'])->name('saludos.update');
