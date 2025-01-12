<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keyswitch;
use App\Models\Store;


class KeyboardController extends Controller
{
    // Returns the view to select a keyboard (once implemented) for now it just shows keyswitches as a test
    public function keyboardSelect(){
        $keyswitches = Keyswitch::all();
        $stores = Store::all();
        return view('keyboardselect', compact( 'keyswitches', 'stores'));
    }
}
