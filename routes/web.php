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
   	dd(\Auth::user());
});
Route::get('/test',function(){
	return view('demo.index');
});


Route::get('/faqiqingqiu','TestController@login');

Route::get('/github/login','TestController@githublogin');	
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
