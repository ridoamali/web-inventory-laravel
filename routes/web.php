<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;

// menampilkan halaman depan home
Route::get('/', function () {
    return view('welcome'); // Menampilkan view welcome.blade.php
});

Route::get('/products', [ProductController::class, 'index'] );
Route::get('/products/create', [ProductController::class, 'create'] );
Route::get('/products/edit{id}', [ProductController::class, 'edit'] );
Route::post('/products/store', [ProductController::class, 'store'] );
Route::put('/products/{id}', [ProductController::class, 'update'] );
Route::delete('/products/{id}', [ProductController::class, 'delete'] );
// create, edit, itu menjalankan sebuah method dari function yg dibuat di controller
Route::get('/categories', [CategoryController::class, 'index'] );
Route::get('/categories/create', [CategoryController::class, 'create'] );
Route::get('/categories/edit{id}', [CategoryController::class, 'edit'] );
Route::post('/categories/store', [CategoryController::class, 'store'] );
Route::put('/categories/{id}', [CategoryController::class, 'update'] );
Route::delete('/categories/{id}', [CategoryController::class, 'delete'] );
