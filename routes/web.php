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

Route::get('/', 'MenuController@index');

Route::get('/{?key}', 'MenuController@find');

Route::get('/create', function(){
    return view('page/Create');
});

Route::post('/create', 'MenuController@create');

Route::post('/update/{id}', 'MenuController@edit');

Route::get('/show/{id}', 'MenuController@detail');

Route::get('/delete/{id}', 'MenuController@delete');

Route::get('/download/{id}', 'MenuController@download');

Route::get('/about', function () {
    return view('page/About');
});


