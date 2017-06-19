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

Route::get('report-anggaran-tahunan', 'AnggaranController@report_anggaran_tahunan');

Route::get('report-anggaran-bulanan', 'AnggaranController@report_anggaran_bulanan');

Route::get('input-anggaran-tahunan', 'AnggaranController@input_anggaran_tahunan');

Route::get('input-pencairan-anggaran-bulanan', 'AnggaranController@input_pencairan_anggaran_bulanan');

Route::get('report-anggaran-rinci', 'AnggaranController@report_anggaran_rinci');

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