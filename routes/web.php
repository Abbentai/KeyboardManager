<?php

use App\Http\Controllers\KeyboardController;
use App\Http\Controllers\StoresController;
use App\Http\Controllers\PartController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Default main route for the whole app
Route::get('/', function () {
    return view('home');
});

// Keyboard Routes

//Keyboard viewing and selection screen
Route::get('/keyboards', [KeyboardController::class, 'keyboardSelect'])->name('keyboards.index');

//Create a new keyboard
Route::get('/keyboards/create', [KeyboardController::class, 'create'])->name('keyboards.create');

//Store new keyboard in db
Route::post('/keyboards/create', [KeyboardController::class, 'store'])->name('keyboards.store');

//Deletes a keyboard from the db
Route::delete('/keyboards/{id}', [KeyboardController::class, 'destroy'])->name('keyboards.destroy');

//Gets the form for a user to edit a keyboard's details
Route::get('/keyboards/edit/{id}', [KeyboardController::class, 'edit'])->name('keyboards.edit');

//Updates a particular keyboard's details
Route::put('/keyboards/update/{id}', [KeyboardController::class, 'update'])->name('keyboards.update');

//View a keyboard based on id
Route::get('/keyboards/view/{id}', [KeyboardController::class, 'view'])->name('keyboards.view');




// Store Routes

//View all stores
Route::get('/stores', [StoresController::class, 'index'])->name('stores.index');

//Create new store
Route::get('/stores/create', [StoresController::class, 'create'])->name('stores.create');

//Store new store in db
Route::post('/stores/create', [StoresController::class, 'store'])->name('stores.store');

//Deletes a store from the db
Route::delete('/stores/{id}', [StoresController::class, 'destroy'])->name('stores.destroy');

//Gets the form for a user to edit a store's details
Route::get('/stores/edit/{id}', [StoresController::class, 'edit'])->name('stores.edit');

//Updates a particular store's details
Route::put('/stores/update/{id}', [StoresController::class, 'update'])->name('stores.update');



// Keyswitch Routes

//Create new keyswitch
Route::get('/parts/create', [PartController::class, 'create'])->name('parts.create');

//Store new keyswitch in db
Route::post('/parts/create', [PartController::class, 'store'])->name('parts.store');

//Deletes a keyswitch from the db
Route::delete('/parts/{id}', [PartController::class, 'destroy'])->name('parts.destroy');

//Gets the form for a user to edit a keyswitch's details
Route::get('/parts/edit/{id}', [PartController::class, 'edit'])->name('parts.edit');

//Updates a particular keyswitch's details
Route::put('/parts/update/{id}', [PartController::class, 'update'])->name('parts.update');