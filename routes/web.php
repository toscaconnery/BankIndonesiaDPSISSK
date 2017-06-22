<?php

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'DashboardController@index');

Route::get('dashboard', 'DashboardController@index');

// PROYEK
Route::get('list-proyek', 'ProjectController@list_proyek');
Route::post('save-input-proyek', 'ProjectController@save_input_proyek');
Route::get('input-tahap-proyek/{id}', 'ProjectController@input_tahap_proyek');
Route::post('input-tahap-proyek/{id}', 'ProjectController@save_input_tahap_proyek');
Route::get('input-sub-tahapan/{id}', 'ProjectController@input_sub_tahapan');
Route::post('input-sub-tahapan/{id}', 'ProjectController@save_input_sub_tahapan');
Route::get('list-file-proyek', 'ProjectController@list_file_proyek');
//Route::get('input-proyek', 'ProjectController@input_proyek');
// Route::get('input-detail-tahapan', 'ProjectController@input_detail_tahapan');

// ARSIP
Route::get('list-arsip', 'ArsipController@list_arsip');
Route::post('list-arsip', 'ArsipController@save_input_folder');
Route::get('input-arsip', 'ArsipController@input_arsip');
Route::get('list-file-arsip', 'ArsipController@list_file_arsip');

// ANGGARAN
Route::get('input-anggaran-tahunan', 'AnggaranController@input_anggaran_tahunan');
Route::get('report-anggaran-tahunan', 'AnggaranController@report_anggaran_tahunan');
Route::post('report-anggaran-tahunan', 'AnggaranController@save_input_anggaran_tahunan');
Route::post('input-pencairan-anggaran', 'AnggaranController@save_input_pengeluaran');
Route::get('report-anggaran-bulanan', 'AnggaranController@report_anggaran_bulanan');
Route::get('report-anggaran-rinci', 'AnggaranController@report_anggaran_rinci');

// ISSUE
Route::get('list-issue', 'IssueController@list_issue');
Route::get('list-all-issue', 'IssueController@list_all_issue');
Route::get('input-issue', 'IssueController@input_issue');
Route::post('input-issue', 'IssueController@save_input_issue');
Route::get('edit-issue/{id}', 'IssueController@edit_issue');
Route::post('edit-issue/{id}', 'IssueController@save_edit_issue');

Auth::routes();

Route::get('/home', 'DashboardController@index')->name('home');

Route::get('autentikasi', function() {
	return view('auth.login-register');
});

Route::get('logout', function() {
	Auth::logout();
	return redirect('autentikasi');
});


