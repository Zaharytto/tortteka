<?php

use App\Http\Controllers\OrdersController;
use App\Http\Controllers\OrdersCustomsController;
use App\Http\Controllers\CakesController;
use App\Http\Controllers\BasketsController;
use Illuminate\Support\Facades\Route;


Route::get('/', [CakesController::class, 'index']);
Route::get('/cakes/{id}', [CakesController::class, 'show']);
Route::post('/', [CakesController::class, 'store']);

Route::get('/baskets/create', [BasketsController::class, 'index']);

Route::get('/orders/success', [OrdersController::class, 'success']);
Route::get('/orders/create', [OrdersController::class, 'create']); 
Route::post('/orders', [OrdersController::class, 'store']); 

Route::get('/orders_customs', [OrdersCustomsController::class, 'index']);
Route::get('/orders_customs/create', [OrdersCustomsController::class, 'create']);
Route::post('/orders_customs', [OrdersCustomsController::class, 'store']);





