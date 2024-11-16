<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Middleware\CheckIsLogged;
use App\Http\Middleware\CheckIsNotLogged;
use Illuminate\Support\Facades\Route;

// AUTH ROUTES - USER NOT LOGGED

route::middleware([CheckIsNotLogged::class])->group(function(){
    route::get('/login', [AuthController::class, 'login']);
    route::post('/loginSubmit', [AuthController::class, 'loginSubmit']);
});

// AUTH ROUTES - USER LOGGED
route::middleware([CheckIsLogged::class])->group(function(){
    route::get('/', [MainController::class, 'index']);
    route::get('/newNote', [MainController::class, 'newNote']);
    route::get('/logout', [AuthController::class, 'logout']);
});


