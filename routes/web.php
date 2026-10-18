<?php

use App\Http\Controllers\PlantController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PlantController::class, 'index'])->name('plants.index');
Route::get('/plants/{plant}', [PlantController::class, 'show'])->name('plants.show');