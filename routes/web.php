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
Route::get('list-file-sub-tahapan/{id}/{deeppath?}', 'ProjectController@list_file_sub_tahapan');			//Akses Folder & File
Route::post('list-file-sub-tahapan/{id}/{deeppath?}', 'ProjectController@save_list_file_sub_tahapan');		//Upload File
Route::post('tambah-folder-sub-tahapan/{id}/{deeppath?}', 'ProjectController@tambah_folder_sub_tahapan');	//Tambah Folder
Route::get('mulai-proyek/{id_proyek}', 'ProjectController@mulai_proyek');
Route::get('mulai-tahap-proyek/{id_tahapan}', 'ProjectController@mulai_tahap_proyek');
Route::get('mulai-sub-tahapan-proyek/{id}', 'ProjectController@mulai_sub_tahapan_proyek');
Route::get('selesaikan-semua-sub-tahapan/{id}', 'ProjectController@selesaikan_tahapan_proyek');
Route::get('selesaikan-sub-tahapan/{id}', 'ProjectController@selesaikan_sub_tahapan_proyek');
Route::post('upload-file-mlbi/{id}/{deeppath?}', 'ProjectController@upload_file_mlbi');
Route::get('delete-file-sub-tahapan/{id_file}', 'ProjectController@delete_file_sub_tahapan');
Route::get('delete-sub-tahapan/{id_sub_tahapan}', 'ProjectController@delete_sub_tahapan');
Route::get('delete-folder-sub-tahapan/{id_folder}', 'ProjectController@delete_folder_sub_tahapan');
Route::post('edit-tahapan-proyek/{id_tahapan}', 'ProjectController@edit_tahapan_proyek');

// ARSIP
Route::get('list-arsip', 'ArsipController@list_arsip');
Route::post('list-arsip', 'ArsipController@save_input_folder');
Route::get('input-arsip', 'ArsipController@input_arsip');
Route::get('list-file-arsip', 'ArsipController@list_file_arsip');
Route::get('download-file/{id}', 'ArsipController@download_file');
Route::get('list-tahun-arsip', 'ArsipController@list_tahun_arsip');
Route::get('list-arsip-proyek/{id_tahun}', 'ArsipController@list_arsip_proyek');
Route::get('list-arsip-tahapan-proyek/{id_folder_proyek}', 'ArsipController@list_arsip_tahapan_proyek');
Route::post('tambah-tahun-arsip', 'ArsipController@tambah_tahun_arsip');
Route::get('list-file-tahun-arsip/{tahun}', 'ArsipController@list_file_tahun_arsip');
Route::post('list-file-tahun-arsip/{tahun}', 'ArsipController@list_file_tahun_arsip2');

//Route::get('list-arsip-folder', 'ArsipController@list_arsip_folder');
// Route::get('mlbi/{id}/{deeppath?}', 'ArsipController@mlbi');
//Route::post('tambah-file-sub-tahapan-proyek', 'ArsipController@tambah_file_sub_tahapan_proyek');

// ANGGARAN
Route::get('input-anggaran-tahunan', 'AnggaranController@input_anggaran_tahunan');
Route::get('report-anggaran-tahunan', 'AnggaranController@report_anggaran_tahunan');
Route::post('report-anggaran-tahunan', 'AnggaranController@save_input_anggaran_tahunan');
Route::post('edit-anggaran-tahunan', 'AnggaranController@save_edit_anggaran_tahunan');
Route::post('input-pencairan-anggaran', 'AnggaranController@save_input_pengeluaran');
Route::get('report-anggaran-bulanan/{tahun}', 'AnggaranController@report_anggaran_bulanan');
Route::get('report-anggaran-rinci/{tahun_anggaran}/{idbulan}', 'AnggaranController@report_anggaran_rinci');
Route::post('report-anggaran-rinci/{tahun_anggaran}/{idbulan}', 'AnggaranController@save_edit_pengeluaran');

// ISSUE
Route::get('list-issue', 'IssueController@list_issue');
Route::get('list-all-issue', 'IssueController@list_all_issue');
Route::post('input-issue', 'IssueController@save_input_issue');
Route::post('pencarian-issue', 'IssueController@cari_issue');
Route::get('edit-issue/{id}', 'IssueController@edit_issue');
Route::post('edit-issue/{id}', 'IssueController@save_edit_issue');

// PROFILE
Route::get('edit-profile', 'ProfileController@edit_profile');
Route::post('edit-profile', 'ProfileController@save_edit_profile');
Auth::routes();

Route::get('/home', 'DashboardController@index')->name('home');

Route::get('logout', 'Auth\LoginController@logout');

Route::get('autentikasi', function() {
	return view('auth.login-register');
});




