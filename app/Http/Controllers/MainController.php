<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
   public function index()
   {
    //load user notes

    // load home view
    return view('home');
   }

   public function newNotes()
   {
    echo 'ESTOU CRIANDO UMA NOTA';
   }

}
