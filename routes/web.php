<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




Route::middleware(['auth'])->group(function () {

    Route::get('/master', function () {

        return view('layouts.master');
    });
});

Route::resource('products', 'site\ProductController');
Route::get('/blog/index', 'admin\blogController@index')->name('blog.index');
Route::get('/blog/create', 'admin\blogController@create')->name('blog.create');
Route::post('/blog/store', 'admin\blogController@store')->name('blog.store');
Route::get('/blog/delete/{id}', 'admin\blogController@destroy')->name('blog.destroy');
