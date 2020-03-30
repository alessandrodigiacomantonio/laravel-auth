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
})->name('/');

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');
Route::get('posts/post_{post}', 'HomeController@show')->name('home.show');

Route::name('admin.')->prefix('admin')->namespace('Admin')->middleware('auth')->group(function ()
{
 Route::get('home', 'HomeController@index')->name('home');
 Route::get('posts/new-post', 'PostController@create')->name('posts.create');
 Route::post('posts/new-post', 'PostController@store')->name('posts.store');
 Route::post('posts/post_{post}/edit', 'PostController@edit')->name('posts.edit');
 Route::post('posts/post_{post}', 'PostController@update')->name('posts.update');
 Route::delete('posts/post_{post}', 'PostController@delete')->name('posts.delete');
}
);
