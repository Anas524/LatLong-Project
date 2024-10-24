<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationtsController;

Route::get('/', [LocationtsController::class, 'homeView'])->name('location-ts');
Route::post('/add-locationts', [LocationtsController::class, 'addLocationts']);