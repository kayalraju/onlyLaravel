<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Middleware\ProductController;


Route::get('/', [PostController::class, 'index'])->name('posts.index');
Route::get('/add', [PostController::class, 'addview'])->name('posts.addview');
Route::post('/create', [PostController::class, 'createData'])->name('posts.create');
Route::get('/edit/{id}', [PostController::class, 'editview'])->name('posts.editview');
Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/delete/{id}', [PostController::class, 'destroy'])->name('posts.delete');


//middleware

//Route::get('/product',[ProductController::class,'product'])->middleware('agecheck')->name('product');

//middleware group
Route::middleware(['agecheck'])->group(function () {
    Route::get('/product', [ProductController::class, 'product'])->name('product');
    Route::get('/addproduct', [ProductController::class, 'addproduct'])->name('addproduct');
});