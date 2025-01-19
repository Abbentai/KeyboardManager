<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Keyswitch;
use App\Models\Keyboard;

class PartController extends Controller
{

    //Returns the view for the keyswitch creation form, along with a new empty keyswitch
    public function create(Request $request)
    {
        $part = $request->query('type');
        $keyboardID = $request->query('id');
        $partname = '';
        $stores = Store::all();

        if ($part == 'keyswitch') {
            $part = new Keyswitch();
            $partname = 'keyswitch';
        } else if ($part == 'pcb') {
            $part = new Keyswitch();
            $partname = 'pcb';
        }



        return view('parts.create', compact('part', 'keyboardID', 'partname', 'stores'));
    }

    //Returns the view for the keyswitch editing form for a specific keyswitch
    public function edit($id)
    {
        $keyswitch = Keyswitch::find($id);
        return view('parts.edit', compact('keyswitch'));
    }

    //Submits a new keyswitch to the database and associates it with the current keyboard
    public function store(Request $request)
    {
        $request->getValidators();

        //getting keyboard based on id and making sure it valid
        $keyboardID = $request->keyboardID;
        $keyboard = Keyboard::find($keyboardID);

        if (!$keyboard) {
            return redirect()->back()->withErrors(['keyboardID' => 'Keyboard not found']);
        }

        //associating the part with the keyboards
        $keyswitch = Keyswitch::create($request->all());
        $keyboard->keyswitch_id = $keyswitch->id;
        $keyboard->save();

        $message = 'New part ' . $request->name . ' has been added';
        return redirect()->route('keyboards.view', ['id' => $keyboardID])
            ->with('message', $message);
    }

    //Destroys the keyswitch depending on the id given
    public function destroy($id)
    {
        $keyswitch = Keyswitch::find($id);
        $keyswitch->delete();
        $message = 'Keyswitch ' . $keyswitch->name . ' has been deleted successfully';

        return back()->with('message', $message); //returns to previous page
    }

    //Updates an existing keyswitch in the database based on its id
    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'url' => 'url'
        ]);

        $keyswitch = Keyswitch::find($id);
        $keyswitch->update($request->all());

        $message = "Keyswitch " . $keyswitch->name . " has been updated";
        return redirect()->route('parts.index')->with('message', $message);
    }

    private function getValidators()
    {
        $validation = Validator::make(([
            'name' => 'required',
            'actuation_force' => 'required|numeric',
            'travel_distance' => 'required|numeric',
            'type' => 'required',
            'prelubed' => 'required',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'store_id' => 'required',
        ]));

        return $validation;
    }
}
