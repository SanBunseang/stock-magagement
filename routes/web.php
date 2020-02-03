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
Route::get('/admin','adminConller@index');
Route::get('/user','userController@index')->name('user');
Route::get('/users','usersController@index')->name('users');
Route::get('/staff', 'staffController@index')->name('staff.index');
Route::post('/staff/insertStaff','staffController@store')->name('insertStaff');
Route::get('/editStaff/{id}','staffController@edit')->name('editStaff');
Route::put('/updateStaff/{id}','staffController@update')->name('updateStaff');
// Route::get('/deleteStaff/{id}','staffController@delete')-> name('deleteStaff');
// Route::delete('/destroyStaff/{id}','staffController@destroy')-> name('destroyStaff');
Route::get('/showStaff/{id}','staffController@show')-> name('showStaff');
Route::post('/showStaff/getstaff','staffController@getStaff')-> name('getstaff');
Route::post('/showStaff/getCurrentStaff','staffController@getCurrentStaff')-> name('getCurrentStaff');
Route::delete('/changeStatus/{id}','staffController@changeStatus')-> name('changeStatus');
