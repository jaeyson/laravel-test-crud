<?php

use Illuminate\Support\Facades\Route;

//if (Auth::check()) Route::get('/', 'ContactController@index');
//else Route::get('/', function() {return view('welcome');});

/*
Route::get('/', ['middleware'=>'guest', function() {
  return redirect('contacts');
}]);
Route::get('/', function () {
  return redirect('contacts');
})->middleware('auth');

Route::group(['middleware'=>'auth'], function () {
  Route::get('/', 'HomeController@index');
  Route::get('/contacts', 'HomeController@index');
  Route::get('/home', 'HomeController@index');
});

Route::group(['middleware'=>'guest'], function () {
  Route::get('/', 'ContactController@index');
  Route::get('/home', 'ContactController@index');
});
Route::group(['middleware'=>['guest']], function () {
  Route::redirect('/contacts', '/login');
  Route::redirect('/home', '/login');
});
*/

Route::group(['middleware'=>['guest']], function () {
  Route::view('/', 'home');
  Route::get('/contacts', function() {return redirect('login');});
});

Route::group(['middleware'=>['auth']], function () {
  Route::get('/', function() {return redirect('contacts');});
  Route::get('/home', function() {return redirect('contacts');});
});

Auth::routes();

Route::resource('contacts', 'ContactController');
Route::get('/home', 'HomeController@index');
//Route::get('/home', 'HomeController@index')->name('home');
