<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginSubmit(Request $request)
    {
        $request->validate(
            [
                'text_username' => 'required|email',
                'text_password' => 'required|min:6|max:16'
            ],
            [
                'text_username.required' => 'O username precisa ser preenchido',
                'text_username.email' => 'O username precisa ser um email',
                'text_password.required' => 'A password precisa ser preenchida',
                'text_password.min' => 'A password precisa ter no mínimo :min caracteres',
                'text_password.max' => 'A password precisa ter no máximo :max caracteres'
            ]
            );


            // get user input
            $username = $request->input('text_username');
            $password = $request->input('text_password');
            echo 'OK!';

            // get all users form the database
            // $users = User::all()->toArray();

            // as an object instance of the model's class
            $userModel = new User();
            $users = $userModel->all()->toArray();
            echo '<pre>';
            print_r($users);
    }

    public function logout()
    {
        echo 'logout';
    }
}
