<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdvertisementController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/kategoria/{category}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/ogloszenie/{advertisement}', [AdvertisementController::class, 'show'])->name('advertisement.show');