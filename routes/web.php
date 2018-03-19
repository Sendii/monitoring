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
	return view('landing-page');
});
Route::middleware(['admin']&&['kadiv'])->group(function () {
	Route::get('/allPegawai', 'PegawaiController@allPegawai')->name('allPegawai');
	Route::get('/allUnit', 'UnitKerjaController@allUnit')->name('allUnit');
	Route::get('/alluser', 'HomeController@alluser')->name('alluser');
});
Route::middleware(['admin'])->group(function () {
	Route::get('/admin', 'HomeController@index')->name('home');
	Route::get('/allPpbj', 'BppjController@allPpbj')->name('allPpbj');
	Route::get('/inputPpbj', 'BppjController@addPpbj');
	Route::post('/savePpbj/', 'BppjController@savePpbj');
	Route::get('/editPpbj/{id}','BppjController@editPpbj')->name('editPpbj');
	Route::post('/editPpbj/', 'BppjController@updatePpbj')->name('updatePpbj');
	Route::get('/allPpbj/delete/{id}','BppjController@delete_ppbj')->name('delete_ppbj');
	Route::get('/inputPegawai', 'PegawaiController@addPegawai');
	
	Route::post('/savePegawai', 'PegawaiController@savePegawai');
	Route::get('/editPegawai/{id_pegawai}', 'PegawaiController@editPegawai')->name('editPegawai');
	Route::post('/editpegawai', 'PegawaiController@updatePegawai');

	Route::get('/inputUnit', 'UnitKerjaController@addUnit');
	Route::post('/saveUnit', 'UnitKerjaController@saveUnit');
	Route::get('/editUnit/{id_unit}','UnitKerjaController@editUnit')->name('editUnit');
	Route::post('editUnit', 'UnitKerjaController@updateUnit');

	Route::get('/edituser/{id}','HomeController@edituser');
	Route::post('/edituser/', 'HomeController@updateuser');
});

Route::middleware(['kasubag'])->group(function () {
	Route::get('/receivePpbj', 'PenugasanController@receivePpbj')->name('receivePpbj');
	Route::get('addAsignment/{id}', 'PenugasanController@addAsignment')->name('addAsignment');
	Route::post('saveAssignment', 'PenugasanController@saveAssignment')->name('saveAsignment');
	Route::get('editassignmentPpbj/{id}', 'PenugasanController@editassignmentPpbj');
	Route::post('updateassignmentPpbj/{id}', 'PenugasanController@updateassignmentPpbj');
});

Route::middleware(['kadiv'])->group(function () {
	Route::get('/monitoring', 'MonitoringController@allMonitoring')->name('allMonitoring');
	Route::get('/viewAlldata/{id}', 'MonitoringController@viewAlldata')->name('viewAlldata');
});

Route::middleware(['publicpeople'])->group(function () {
	Route::get('userspeople', 'HomeController@userpeople')->name('userpeople');
});
// Route::get('pagenotfound', ['as' => 'notfound', 'uses' => 'HomeController@pagenotfound']);
Route::post('/', 'HomeController@contactme')->name('contactme');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('profile/', 'HomeController@profile');
Auth::routes();
Route::get('home', 'HomeController@index')->name('home');