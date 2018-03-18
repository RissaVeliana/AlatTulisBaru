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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/filter/{id}', 'JenisController@filter');

Route::group(['middleware' => 'web'], function() {
	Route::group(['prefix'=>'admin','middleware'=>['auth', 'role:admin']], function(){
		Route::resource('/supplier','SupplierController');
		Route::resource('/jenis','JenisController');		
		Route::resource('/barang','BarangController');
		Route::resource('/penjualan','PenjualanController');
		Route::resource('/pembelian','PembelianController');
		Route::get('/laporan','LaporanController@index');
		Route::post('/laporan/pdf','LaporanController@index2');
		Route::post('/laporan/detail','LaporanController@index3');
		
		Route::get('/laporan1','LaporanController@index4');
		Route::post('/laporan/pdf1','LaporanController@index5');
		Route::post('/laporan/detail1','LaporanController@index6');

		Route::get('/filter/jenis/{id}', 'JenisController@jenis');
		Route::get('/filter/harga/{id}', 'JenisController@harga');	
		Route::get('/filter/harga1/{id}', 'JenisController@harga1');	
		Route::get('/filter/supplier/{id}', 'JenisController@supplier');	

	
				 
		

});


});

Route::group(['middleware'=>'cors'],function(){
			Route::get('/listdata','ApiController@listdata');

		});
