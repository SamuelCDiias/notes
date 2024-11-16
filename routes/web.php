<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    echo "Hello World";
});

Route::get('/about', function(){
    echo "This About";
});

Route::get('/main/{value}', [MainController::class, 'index']);
Route::get('/teste2/{value}', [MainController::class, 'teste2']);
Route::get('/teste3/{value}', [MainController::class, 'teste3']);

