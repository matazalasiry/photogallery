<?php

use Illuminate\Support\Facades\Route;

Route::get('/','ImageController@index');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::Post('/image','ImageController@post');
Route::delete('/image/{id}','ImageController@destroy');

