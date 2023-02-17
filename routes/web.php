<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/product/{slug}', [App\Http\Controllers\ProductController::class, 'getProduct'])->name('product-details');


Route::post('checkout', [App\Http\Controllers\ProductController::class, 'checkout'])->name('checkout');

Route::get('/success/{product_id}', [App\Http\Controllers\ProductController::class, 'success'])->name('success');

