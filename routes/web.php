<?php

use App\Http\Controllers\CoffeeController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GetController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/display-coffee', [GetController::class, 'display_coffee']);
Route::get('/create-coffee', [GetController::class, 'coffee']);

// Session - Table 1
Route::post('/session-table1', [SessionController::class, 'session_one']);

// Session - Table 2
Route::post('/session-table2', [SessionController::class, 'session_two']);

// Session - Table 3
Route::post('/session-table3', [SessionController::class, 'session_three']);

// Session - Table 4
Route::post('/session-table4', [SessionController::class, 'session_four']);

// Session - Table 5
Route::post('/session-table5', [SessionController::class, 'session_five']);

// Coffee Admin
Route::post('/add-coffee', [CoffeeController::class, 'store']);
Route::patch('/edit/{coffee}', [CoffeeController::class, 'update']);

// Order Coffee
Route::post('/order-post', [OrderController::class, 'store']);