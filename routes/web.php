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

/*Route::get('/', function () {
    return view('welcome');
});
*/
Auth::routes();


Route::get('/', 'HomeController@listposts')->name('listposts');
Route::get('/new', 'HomeController@newpost')->name('newpost')->middleware('auth');;
Route::post('/new', 'HomeController@createpost')->middleware('auth');;
Route::get('/edit/{id}', 'HomeController@editpost')->middleware('auth');
Route::post('/edit/{id}', 'HomeController@commitpost')->middleware('auth');
