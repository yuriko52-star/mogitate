<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/products', [ProductController::class,'index'])->name('products.index');
Route::get('/products/{productId}',[ProductController::class,'show'])->name('products.show');
Route::put('/products/{productId}/update',[ProductController::class,'update'])->name('products.update');