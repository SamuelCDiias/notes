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

    // create a new note
    route::post('/newNoteSubmit', [MainController::class, 'newNoteSubmit'])->name('newNoteSubmit');


    // edit note
    route::get('/editNote/{id}', [MainController::class, 'editNote'])->name('edit');
    route::post('/editNoteSubmit', [MainController::class, 'editNoteSubmit'])->name('editNoteSubmit');
    route::get('/deleteNote/{id}', [MainController::class, 'deleteNote'])->name('delete');

    route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});


