<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::view('/', 'home')->name('home');
Route::view('nosotros', 'nosotros')->name('nosotros');

Route::resource('personas', 'App\Http\Controllers\PersonasController')
    ->names('personas')
    ->middleware('auth');

/* Route::get('personas', 'App\Http\Controllers\PersonasController@index')->name('personas.index');
Route::get('personas/crear', 'App\Http\Controllers\PersonasController@create')->name('personas.create');
Route::get('personas/{id}/editar', 'App\Http\Controllers\PersonasController@edit')->name('personas.edit');
Route::patch('personas/{id}', 'App\Http\Controllers\PersonasController@update')->name('personas.update');
Route::post('personas', 'App\Http\Controllers\PersonasController@store')->name('personas.store');
Route::get('personas/{id}', 'App\Http\Controllers\PersonasController@show')->name('personas.show');
Route::delete('personas/{persona}', 'App\Http\Controllers\PersonasController@destroy')->name('personas.destroy'); */

Route::view('contacto', 'contacto')->name('contacto');
Route::post('contacto', 'App\Http\Controllers\ContactoController@store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
