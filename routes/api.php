<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api')->name('logout');
    Route::post('/refresh', [AuthController::class, 'refresh'])->middleware('auth:api')->name('refresh');
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'users'
], function ($router) {
    Route::post('/create', [UserController::class, 'create'])->middleware('auth:api')->name('create');
    Route::get('/{id}', [UserController::class, 'get'])->middleware('auth:api')->name('get');
    Route::put('/update', [UserController::class, 'update'])->middleware('auth:api')->name('update');
    Route::delete('/{id}', [UserController::class, 'delete'])->middleware('auth:api')->name('delete');
});
