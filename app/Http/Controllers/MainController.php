<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index($value){
        return view('main', ['value' => $value]);
    }

    public function teste2($value){
        return view('teste2', ['value' => $value]);
    }

    public function teste3($value){
        return view('teste3', ['value' => $value]);
    }

}
