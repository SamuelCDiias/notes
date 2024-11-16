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
    $notes = User::find($id)
                    ->notes()
                    ->whereNull('deleted_at')
                    ->get()
                    ->toArray();

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


   public function editNoteSubmit(Request $request)
   {
    // validated
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

    // check if note_id exist

    if($request->note_id == NULL){
        return redirect()->route('home');
    }

    // decrypt note_id
    $id = Operations::decryptId($request->note_id);


    // load note
    $note = Note::find($id);

    // update note
    $note->title = $request->text_title;
    $note->text = $request->text_note;
    $note->save();

    // return home
    return redirect()->route('home');
   }

   public function deleteNote($id)
   {
    $id = Operations::decryptId($id);

    // load note
    $note = Note::find($id);

    // show delete confirmation
    return view('delete_confirm', ['note' => $note]);

    }

    public function deleteConfirm($id)
    {
        // check if id is encrypted
        $id = Operations::decryptId($id);

        // load note
        $note = Note::find($id);

        // hard delete
        // $note->delete();

        // soft delete
        $note->deleted_at = date('Y-m-d H:i:s');
        $note->save();

        // redirect home
        return redirect()->route('home');
    }
   }

