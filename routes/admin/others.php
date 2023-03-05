<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TechnologyController as TechnologyController;
use App\Http\Controllers\Admin\TypeController as TypeController;

/*
|--------------------------------------------------------------------------
| Projects Routes
|--------------------------------------------------------------------------
|
| Here is where you can register the less important routes in the Admin section 
|
*/

Route::resource('types',TypeController::class , ['except' => ['create' , 'store' , 'destroy']]);
Route::resource('technologies',TechnologyController::class);