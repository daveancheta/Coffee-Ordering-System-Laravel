<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeContrloller;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeContrloller::class, 'index']);
Route::get('/display-coffee', [HomeContrloller::class, 'display']);

// Session
Route::post('/session', [SessionController::class, 'store']);
