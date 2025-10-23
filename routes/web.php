<?php

use App\Http\Controllers\ComissionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ComissionController::class, 'index'])->name('commission.index');
Route::post('/', [ComissionController::class, 'calculate'])->name('commission.calculate');