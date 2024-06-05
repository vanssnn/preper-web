<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionRequestController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\UserProfileController;

Route::get('/request-sesi', [SessionRequestController::class, 'showForm']);
Route::post('/submit-form', [SessionRequestController::class, 'submitForm'])->name('submit.form');
Route::get('/', [NavigationController::class, 'home'])->name('home');
Route::get('/profile', [UserProfileController::class, 'showProfile']);
Route::post('/profile', [UserProfileController::class, 'saveProfile'])->name('save.profile');

Route::get('/about', function () {
    return view('about');
})->name('about');
