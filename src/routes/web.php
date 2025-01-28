<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeaderController;
use App\Http\Controllers\AuthController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/leaders', [LeaderController::class, 'list']);

Route::get('/leaders/create', [LeaderController::class, 'create']);

Route::post('/leaders/put', [LeaderController::class, 'put']);

Route::get('/leaders/update/{leader}', [LeaderController::class, 'update']);

Route::post('/leaders/patch/{leader}', [LeaderController::class, 'patch']);

Route::post('/leaders/delete/{leader}', [LeaderController::class, 'delete']);

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/auth', [AuthController::class, 'authenticate']);

Route::get('/logout', [AuthController::class, 'logout']);

