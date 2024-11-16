<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use App\Services\Operations;
use Illuminate\Http\Request;

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
    return view('new_note');
   }

   public function newNoteSubmit(Request $request)
   {
    // validate request
    $request->validate(
        [
            'text_title' => 'required|min:3|max:200',
            'text_note' => 'required|min:3|max:3000'
        ],
        [
            'text_title.required' => 'O título precisa ser preenchido',
            'text_title.min' => 'O título precisa ter no mínimo :min caracteres',
            'text_title.max' => 'O título precisa ter no máximo :max caracteres',
            'text_note.required' => 'A nota precisa ser preenchida',
            'text_note.min' => 'A nota precisa ter no mínimo :min caracteres',
            'text_note.max' => 'A nota precisa ter no máximo :max caracteres'
        ]
        );
    //get user id
    $id = session('user.id');

    //create new note
    $note = new Note();
    $note->user_id = $id;
    $note->title = $request->text_title;
    $note->text = $request->text_note;
    $note->save();

    //redirect to home
    return redirect()->route('home');
   }

   public function editNote($id)
   {
    $id = Operations::decryptId($id);

    // load note
    $note = Note::find($id);

    // show edit note view
    return view('edit_note', ['note' => $note]);
   }


   public function editNoteSubmit()
   {

    return redirect()->route('home');

   }

   public function deleteNote($id)
   {
    $id = Operations::decryptId($id);
    echo "Hello! I'm deleting note with id = $id";
    }
   }

