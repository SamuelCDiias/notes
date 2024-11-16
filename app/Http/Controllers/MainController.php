<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Services\Operations;

class MainController extends Controller
{
   public function index()
   {
    //load user notes

    $id = session('user.id');
    $notes = User::find($id)->notes()->get()->toArray();

    // load home view
    return view('home', ['notes' => $notes]);
   }

   public function newNote()
   {
    echo 'ESTOU CRIANDO UMA NOTA';
   }

   public function editNote($id)
   {
    $id = Operations::decryptId($id);
    echo "Hello! I'm editing note with id = $id";

   }

   public function deleteNote($id)
   {
    $id = Operations::decryptId($id);
    echo "Hello! I'm deleting note with id = $id";
    }
   }

