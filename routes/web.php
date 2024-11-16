<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// AUTH ROUTES
route::get('/login', [AuthController::class, 'login']);
route::post('/loginSubmit', [AuthController::class, 'loginSubmit']);

route::get('/logout', [AuthController::class, 'logout']);

