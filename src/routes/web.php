<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeaderController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VisitController;

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

Route::get('/visits', [VisitController::class, 'list']);

Route::get('/visits/create', [VisitController::class, 'create']);

Route::post('/visits/put', [VisitController::class, 'put']);

Route::get('/visits/update/{visit}', [VisitController::class, 'update']);

Route::post('/visits/patch/{visit}', [VisitController::class, 'patch']);

Route::post('/visits/delete/{visit}', [VisitController::class, 'delete']);


