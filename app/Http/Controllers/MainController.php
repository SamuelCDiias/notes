<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
   public function index()
   {
    echo 'ESTOU DENTRO';
   }

   public function newNotes()
   {
    echo 'ESTOU CRIANDO UMA NOTA';
   }

}
