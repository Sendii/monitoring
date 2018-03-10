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
	return view('welcome');
});

Route::get('/search', 'HomeController@search');

Route::middleware(['admin'])->group(function () {
	Route::get('/inputPpbj', 'BppjController@addPpbj')->name('addPpbj');
	Route::get('/allPpbj', 'BppjController@allPpbj')->name('allPpbj');
	Route::post('/savePpbj/', 'BppjController@savePpbj')->name('savePpbj');
	Route::get('/editPpbj/{id}','BppjController@editPpbj')->name('editPpbj');
	Route::post('/editPpbj/', 'BppjController@updatePpbj')->name('updatePpbj');
	Route::get('/allPpbj/delete/{id}','BppjController@delete_ppbj')->name('delete_ppbj');

	Route::get('/allUnit', 'UnitKerjaController@allUnit')->name('allUnit');
	Route::get('/inputUnit', 'UnitKerjaController@addUnit')->name('addUnit');
	Route::post('/saveUnit/', 'UnitKerjaController@saveUnit')->name('saveUnit');

	Route::get('/inputPegawai', 'PegawaiController@addPegawai')->name('addPegawai');
	Route::get('/allPegawai', 'PegawaiController@allPegawai')->name('allPegawai');
	Route::post('/savePegawai/', 'PegawaiController@savePegawai')->name('savePegawai');

	Route::get('/alluser', 'HomeController@alluser')->name('alluser');
	Route::get('/edituser/{id}','HomeController@edituser');
	Route::post('/edituser/', 'HomeController@updateuser');

	Route::get('/admin', 'HomeController@index')->name('home');
	Route::get('/home', 'HomeController@index')->name('home');

});

Route::middleware(['kasubag'])->group(function () {
	Route::get('/receivePpbj', 'PenugasanController@receivePpbj')->name('receivePpbj');
	Route::get('/assignmentPpbj/{id}', 'PenugasanController@editassignmentPpbj')->name('editassignmentPpbj');
	Route::post('/assignmentPpbj/', 'PenugasanController@updateassignmentPpbj')->name('updateassignmentPpbj');
});

Route::middleware(['kadiv'])->group(function () {
	Route::get('/monitoring', 'MonitoringController@allMonitoring')->name('allMonitoring');
});

Route::middleware(['publicpeople'])->group(function () {
	Route::get('userspeople', 'HomeController@userpeople')->name('userpeople');
});
// Route::get('pagenotfound', ['as' => 'notfound', 'uses' => 'HomeController@pagenotfound']);
Route::post('/', 'HomeController@contactme')->name('contactme');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/test', 'DefaultController@test')->name('test');
Route::get('/allfile', 'FileController@allFile')->name('allFile');
Auth::routes();