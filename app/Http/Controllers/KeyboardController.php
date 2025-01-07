<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KeyboardController extends Controller
{
    public function keyboardSelect(){
        return view('keyboardselect');
    }
}
