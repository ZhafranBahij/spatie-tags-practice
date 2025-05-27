<?php

use App\Http\Controllers\NoteController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('note', NoteController::class)->names('note');
Route::resource('tag', TagController::class)->names('tag');