<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('list-proyek', 'ProjectController@list_proyek');

Route::get('satu', 'ProjectController@satu');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('autentikasi', function() {
	return view('auth.login-register');
});

Route::get('logout', function() {
	Auth::logout();
	return redirect('/');
});

Route::get('kosong', function() {
	return view('kosong');
});