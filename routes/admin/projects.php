<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProjectController as ProjectController;

/*
|--------------------------------------------------------------------------
| Projects Routes
|--------------------------------------------------------------------------
|
| Here is where you can register routes in the Admin section of the Project model
|
*/


Route::get('projects/trashed' , [ProjectController::class , 'trashed'])->name('projects.trashed');
Route::get('projects/{project}/restore' , [ProjectController::class , 'restore'])->name('projects.restore')->withTrashed();
Route::get('projects/restore' , [ProjectController::class , 'restoreAll'])->name('projects.restoreAll');
Route::delete('projects/{project}/forceDelete' , [ProjectController::class , 'forceDelete'])->name('projects.forceDelete')->withTrashed();
Route::delete('projects/forceDelete' , [ProjectController::class , 'emptyTrash'])->name('projects.emptyTrash');
Route::resource('projects',ProjectController::class);