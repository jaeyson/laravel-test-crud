<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware'=>['auth']], function () {
  Route::get('account/{user_id}', 'AccountController@edit')->name('accounts.edit');
  Route::patch('account/{user_id}', 'AccountController@update')->name('accounts.update');
});

Route::resource('contacts', 'ContactController')->except(['show']);
Route::get('user/{username}', 'ProfileController@show')->name('profiles.show');

/*
  Route::get('contacts', 'ContactController@index')->name('contacts.index');
  Route::get('contacts/create', 'ContactController@create')->name('contacts.create');
  Route::get('contacts/{contact}/edit', 'ContactController@edit')->name('contacts.edit');
  Route::post('contacts', 'ContactController@store')->name('contacts.store');
  Route::delete('contacts/{contact}', 'ContactController@destroy')->name('contacts.destroy');
  Route::post('contacts/{contact}', 'ContactController@destroy')->name('contacts.destroy');
  Route::patch('contacts/{contact}', 'ContactController@update')->name('contacts.update');
  Route::put('contacts/{contact}', 'ContactController@update')->name('contacts.update');
*/
// Route::resource('contacts', 'ContactController')->middleware('auth');
Auth::routes();
Route::get('/', function() {
  if (Auth::check()) {
    return redirect()->route('contacts.index');
  } else {
    return view('home');
  }
});
/*//not working: duplicate routes?
if (Auth::check()) {
  Route::get('/', 'ContactController@index')->name('contacts.index');
} else {
  Route::get('/', function() {return view('home');});
}
*/