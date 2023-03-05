<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Guest Routes
|--------------------------------------------------------------------------
|
| Here is where you can register the routes for the Guest section 
|
*/

Route::get('/', function () {
    return view('guest.home');
})->name('guest.home');