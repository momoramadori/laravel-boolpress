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


Auth::routes();

Route::get('/posts','PostController@index')->name('posts.index');
Route::get('/posts/{slug}','PostController@show')->name('posts.show');
Route::get('/categories/{slug}','PostController@category')->name('categories.show');
Route::get('/tags/{slug}','PostController@tag')->name('tags.show');
Route::get('/contacts','HomeController@contatti')->name('contact.show');
Route::post('/contacts','HomeController@contattiStore')->name('contact.store');

Route::prefix('admin')->namespace('Admin')->name('admin.')->middleware('auth')->group(function(){
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('/posts','PostController');
});

Route::get('/', 'HomeController@index')->name('home');
