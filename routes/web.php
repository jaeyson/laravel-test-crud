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
Route::group(['middleware'=>['auth']], function () {
  Route::get('/', function() {return redirect('contacts');});
  Route::get('/home', function() {return redirect('contacts');});
});
Route::get($uri, $callback);
Route::post($uri, $callback);
Route::put($uri, $callback);
Route::patch($uri, $callback);
Route::delete($uri, $callback);
Route::options($uri, $callback);
Route::get('user/{id}', function ($id) {
    return 'User '.$id;
});
*/

Route::group(['middleware'=>['auth']], function () {
  //Route::redirect('/', 'ContactController@index');
  //Route::get('contacts', 'ContactController@index');
  Route::get('contacts', [
    'as' => 'contacts.index',
    'uses' => 'ContactController@index'
  ]);
  Route::get('contacts/contact', [
    'as' => 'contacts.create',
    'uses' => 'ContactController@create'
  ]);
  Route::get('contacts/{contact}', [
    'as' => 'contacts.show',
    'uses' => 'ContactController@show'
  ]);
  Route::get('contacts/{contact}/edit', [
    'as' => 'contacts.edit',
    'uses' => 'ContactController@edit'
  ]);
  Route::post('contacts/{contact}', [
    'as' => 'contacts.store',
    'uses' => 'ContactController@store'
  ]);
  Route::delete('contacts/{contact}', [
    'as' => 'contacts.destroy',
    'uses' => 'ContactController@destroy'
  ]);
  Route::post('contacts/{contact}', [
    'as' => 'contacts.destroy',
    'uses' => 'ContactController@destroy'
  ]);
  Route::patch('contacts/{contact}', [
    'as' => 'contacts.update',
    'uses' => 'ContactController@update'
  ]);
  Route::put('contacts/{contact}', [
    'as' => 'contacts.update',
    'uses' => 'ContactController@update'
  ]);
});
// Route::resource('contacts', 'ContactController')->middleware('auth');
Auth::routes();
Route::get('/', function() {return view('home');});

//Route::get('/home', 'HomeController@index');
//Route::get('/home', 'HomeController@index')->name('home');
