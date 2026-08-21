<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LugarController;
use App\Http\Controllers\ContactoController;

Route::get('/', [LugarController::class, 'index'])->name('lugares.index');
Route::get('/lugares/{id}', [LugarController::class, 'show'])->name('lugares.show');

Route::get('/contacto/{id?}', [ContactoController::class, 'create'])->name('contacto.create');
Route::post('/contacto', [ContactoController::class, 'store'])->name('contacto.store');
