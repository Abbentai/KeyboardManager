<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;

class StoresController extends Controller
{
    //Returns the view to see all stores and the navigation to create a new one
    public function index(){
        $stores = Store::all();
        return view('storeviews.index', compact('stores'));
    }


    //Returns the view for the store creation form, along with a new empty store
    public function create(){
        $store = new Store();
        return view('storeviews.create', compact('store'));
    }

    //Returns the view for the store editing form for a specific store
    public function edit($id){
        $store = store::find($id);
        return view('storeviews.edit', compact('store'));
    }

    //Submits a new store to the database
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'url' => 'required|url'
        ]);
        
        Store::create($request->all());
        $message = 'Store ' . $request->name .' has been added';
        return redirect()->route('stores.index')->with('message', $message);
    }

    //Destroys the store depending on the id given
    public function destroy($id){
        $store = Store::find($id);
        $store->delete();
        $message = 'Store ' . $store->name .' has been deleted successfully';
        return back()->with('message', $message); //returns to previous page
    }

    //Updates an existing store in the database based on its id
    public function update($id, Request $request){
        $request->validate([
            'name' => 'required',
            'url' => 'url'
        ]);
        
        $store = Store::find($id);
        $store->update($request->all());

        $message = "Store " . $store->name . " has been updated";
        return redirect()->route('stores.index')->with('message', $message);
    }
}
