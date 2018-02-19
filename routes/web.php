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
Route::get('/edit/{param}', 'HomeController@editpost')->middleware('auth');
Route::post('/edit/{param}', 'HomeController@commitpost')->middleware('auth');
Route::get('/get_captcha/{config?}', function (\Mews\Captcha\Captcha $captcha, $config = 'default') {
    return $captcha->src($config);
});