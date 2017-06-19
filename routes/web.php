<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', 'DashboardController@index');

Route::get('list-proyek', 'ProjectController@list_proyek');

Route::get('input-proyek', 'ProjectController@input_proyek');

Route::get('input-tahap-proyek', 'ProjectController@input_tahap_proyek');

Route::get('input-detail-tahapan', 'ProjectController@input_detail_tahapan');

Route::get('list-arsip', 'ArsipController@list_arsip');

Route::get('input-arsip', 'ArsipController@input_arsip');

Route::get('list-file-arsip', 'ArsipController@list_file_arsip');

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

Route::get('input-anggaran-tahunan', 'AnggaranController@input_anggaran_tahunan');
Route::post('input-anggaran-tahunan', 'AnggaranController@save_input_anggaran_tahunan');

Route::get('input-issue', 'IssueController@tambahkan_issue');
Route::post('input-issue', 'IssueController@save_tambahkan_issue');
Route::get('edit-issue', 'IssueController@edit_issue');
Route::post('edit-issue', 'IssueController@save_edit_issue');