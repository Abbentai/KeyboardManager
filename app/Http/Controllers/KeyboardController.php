<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keyswitch;
use App\Models\Store;


class KeyboardController extends Controller
{
    public function keyboardSelect(){
        $keyswitches = Keyswitch::all();
        $stores = Store::all();

        return view('keyboardselect', compact( 'keyswitches', 'stores'));
    }
}
