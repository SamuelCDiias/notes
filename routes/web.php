<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Middleware\CheckIsLogged;
use Illuminate\Support\Facades\Route;

// AUTH ROUTES
route::get('/login', [AuthController::class, 'login']);
route::post('/loginSubmit', [AuthController::class, 'loginSubmit']);

route::middleware([CheckIsLogged::class])->group(function(){
    route::get('/', [MainController::class, 'index']);
    route::get('/newNote', [MainController::class, 'newNote']);
    route::get('/logout', [AuthController::class, 'logout']);
});


