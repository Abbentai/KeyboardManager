<?php

use App\Http\Controllers\KeyboardController;
use App\Http\Controllers\StoresController;
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

//Keyboard viewing and selection screen
Route::get('/keyboards', [KeyboardController::class, 'keyboardSelect'])->name('keyboards.index');

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