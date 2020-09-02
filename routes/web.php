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

Route::group( ["middleware" => ["auth", "verified"]], function() {

Route::get('/contacts', "ContactController@index")->name('contacts.index');
Route::post('/contacts', "ContactController@store")->name('contacts.store');
Route::get('/contacts/create', "ContactController@create")->name('contacts.create');
Route::get('/contacts/{id}', "ContactController@show")->name('contacts.show');
Route::delete('/contacts/{id}', "ContactController@destroy")->name('contacts.destroy');
Route::put('/contacts/{id}', "ContactController@update")->name('contacts.update');
Route::get('/contacts/{id}/edit', "ContactController@edit")->name('contacts.edit');

});

Route::get('/posts', "PostController@index")->name('posts.index');
Route::get('/posts/{id}', "PostController@show")->name('posts.show');
Route::delete('/posts/{id}', "PostController@destroy")->name('posts.destroy');

//Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
