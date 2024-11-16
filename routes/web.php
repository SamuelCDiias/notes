<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

route::get('/login', [AuthController::class, 'login']);
route::get('/logout', [AuthController::class, 'logout']);

