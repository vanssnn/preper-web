<?php

use App\Http\Controllers\NavigationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [NavigationController::class, 'home']);
