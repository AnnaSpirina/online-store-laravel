<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::get('/order', [OrderController::class, 'order'])->name('order');
Route::get('/{product_id}', [ProductController::class, 'getProduct'])->name('getProduct');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/reduce/{id}', [CartController::class, 'reduce'])->name('cart.reduce');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
Route::post('/createOrder', [OrderController::class, 'createOrder'])->name('createOrder');