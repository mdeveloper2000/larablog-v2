<?php

use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index']);

Route::get('/register', [UserController::class, 'create'])->middleware('guest');
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/authenticate', [UserController::class, 'authenticate'])->middleware('guest');
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
Route::put('/register', [UserController::class, 'store'])->middleware('guest');
Route::get('/users/edit/{id}', [UserController::class, 'edit'])->middleware('auth');
Route::put('/users/update', [UserController::class, 'update'])->middleware('auth');

Route::get('/posts/create', [PostController::class, 'create'])->middleware('auth');
Route::put('/posts/store', [PostController::class, 'store'])->middleware('auth');
Route::get('/posts/{id}', [PostController::class, 'show']);
Route::get('/posts/edit/{id}', [PostController::class, 'edit'])->middleware('auth');
Route::put('/posts/update', [PostController::class, 'update'])->middleware('auth');
Route::post('/posts/search', [PostController::class, 'search']);
Route::delete('/posts/delete/{id}', [PostController::class, 'delete'])->middleware('auth');
Route::post('/posts/comment/{id}', [PostController::class, 'comment'])->middleware('auth');
Route::get('/posts/like/{id}', [PostController::class, 'like'])->middleware('auth');

Route::get('/advertisements/create', [AdvertisementController::class, 'create']);
Route::put('/advertisements/store', [AdvertisementController::class, 'store']);