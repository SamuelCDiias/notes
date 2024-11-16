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

            // collect user
            $user = User::where('username', $username)
                            ->where('deleted_at', NULL)
                            ->first();

            // check username
            if (!$user){
                return redirect()
                    ->back()
                    ->withInput()
                    ->with('loginError', 'Username ou Password incorretos! ');
            }

            // check if password is correct
            if(!password_verify($password, $user->password)){
                return redirect()
                    ->back()
                    ->withInput()
                    ->with('loginError', 'Username ou Password incorretos! ');
            }

            //update last login
            $user->last_login = date('Y-m-d H:i:s');
            $user->save();

            // login user

            session([
                'user' => [
                    'id' => $user->id,
                    'username' => $user->username
                ]
            ]);

            echo 'LOGIN COM SUCESSO';

        }

    public function logout()
    {
        session()->forget('user');
        return redirect()->to('/login');
    }
}
