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
Route::get('admin', ['middleware' => 'admin', function() {
	return view('home');
}]);

Route::middleware(['admin'])->group(function () {
	Route::get('/inputPpbj', 'BppjController@addPpbj')->name('addPpbj');
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
	Route::get('/user', 'HomeController@user');
});


Route::get('pagenotfound', ['as' => 'notfound', 'uses' => 'HomeController@pagenotfound']);
Route::post('/', 'HomeController@contactme')->name('contactme');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/test', 'DefaultController@test')->name('test');
Route::get('/allfile', 'FileController@allFile')->name('allFile');
Auth::routes();

Route::get('/admin', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/allPpbj', 'BppjController@allPpbj')->name('allPpbj');

Route::post('/savePpbj/', 'BppjController@savePpbj')->name('savePpbj');
Route::get('/editPpbj/{id}','BppjController@editPpbj')->name('editPpbj');
ROute::post('/editPpbj/', 'BppjController@updatePpbj')->name('updatePpbj');

Route::get('/allUnit', 'UnitKerjaController@allUnit')->name('allUnit');
Route::get('/inputUnit', 'UnitKerjaController@addUnit')->name('addUnit');
Route::post('/saveUnit/', 'UnitKerjaController@saveUnit')->name('saveUnit');

Route::get('/inputPegawai', 'PegawaiController@addPegawai')->name('addPegawai');
Route::get('/allPegawai', 'PegawaiController@allPegawai')->name('allPegawai');
Route::post('/savePegawai/', 'PegawaiController@savePegawai')->name('savePegawai');

Route::get('/alluser', 'HomeController@alluser');
Route::get('/edituser/{id}','HomeController@edituser')->name('edituser');
ROute::post('/edituser/', 'BppjController@updateuser');