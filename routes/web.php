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
    route::get('/', [MainController::class, 'index'])->name('home');
    route::get('/newNote', [MainController::class, 'newNote'])->name('new');
    route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});


