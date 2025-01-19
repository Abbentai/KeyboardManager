<?php

namespace App\Http\Controllers;

use App\Models\Keyboard;
use Illuminate\Http\Request;
use App\Models\Keyswitch;
use Symfony\Component\Intl\Currencies;


class KeyboardController extends Controller
{
    // Returns the view to select a keyboard (once implemented) for now it just shows keyswitches as a test
    public function keyboardSelect(){
        $keyboards = Keyboard::all();
        return view('keyboardviews.keyboardselect', compact( 'keyboards'));
    }

    //Returns the view for the keyboard creation form, along with a new empty keyboard
    public function create(){
        $keyboard = new Keyboard();
        return view('keyboardviews.create', compact('keyboard'));
    }

    //Returns the view for the keyboard editing form for a specific keyboard
    public function edit($id){
        $keyboard = Keyboard::find($id);
        return view('keyboardviews.edit', compact('keyboard'));
    }

    public function view($id){
        $keyboard = Keyboard::find($id);
        return view('keyboardviews.view', compact('keyboard'));
    }

    //Submits a new keyboard to the database
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'builder_name' => 'required',
            'keyswitch_id' => 'optional'
        ]);
        
        Keyboard::create($request->all());
        $message = 'New keyboard ' . $request->name .' has been added';
        return redirect()->route('keyboards.index')->with('message', $message);
    }

    //Destroys the keyboard depending on the id given
    public function destroy($id){
        $keyboard = Keyboard::find($id);
        $keyboard->delete();
        $message = 'Keyboard ' . $keyboard->name .' has been deleted successfully';

        return redirect()->route('keyboards.index')->with('message', $message);
    }

    //Updates an existing store in the database based on its id

    public function update($id, Request $request){
        $request->validate([
            'name' => 'required',
            'builder_name' => 'required',
            'keyswitch_id' => 'optional'
        ]);
        
        $keyboard = Keyboard::find($id);
        $keyboard->update($request->all());

        $message = "Keyboard " . $keyboard->name . " has been updated";
        return redirect()->route('keyboards.index')->with('message', $message);
    }
}
