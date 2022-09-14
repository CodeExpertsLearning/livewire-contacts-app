<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::name('contacts.')->prefix('contacts')->group(function() {
    Route::get('/', \App\Http\Livewire\Contact\ContactIndex::class)
        ->name('index');
        
    Route::get('/create', \App\Http\Livewire\ContactCreate::class)
        ->name('create');

    Route::get('/edit/{contact}', \App\Http\Livewire\Contact\ContactEdit::class)
        ->name('edit');
});