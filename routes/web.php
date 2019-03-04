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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', function () {
    return view('login');
});

Route::get('/admin', 'AdminController@index');
Route::post('/admin/upload', 'AdminController@upload')->name('admin.upload');
Route::get('/admin/{id_upload}/edit', 'AdminController@edit');
Route::post('/admin/{id_upload}/update', 'AdminController@update');
Route::get('/admin/{id_upload}/delete', 'AdminController@delete');
Route::get('/admin/download', 'AdminController@download');

Route::get('/login', 'AdminController@login');
Route::post('/loginPost', 'AdminController@loginPost');
Route::get('/logout', 'AdminController@logout')->name('admin.logout');
Route::get('/register', 'AdminController@register');
Route::post('registerPost', 'AdminController@registerPost');

Route::get('/admin/retrace', 'AdminController@retrace')->name('admin.retrace');
Route::post('/admin/retrace/process', 'AdminController@process');

// Route::post('admin/retrace/process', function(){
// 	if(Request::ajax()){
// 		return Responce::json(Request::all());
// 	}
// });