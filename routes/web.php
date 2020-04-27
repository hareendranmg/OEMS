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
})->middleware('guest');;

Auth::routes();

// Route::get('/admin', 'AdminHomeController@index')->middleware('isadmin');
// Route::get('/candidate', 'CandidateHomeController@index')->middleware('auth');

Route::group(['middleware' => ['isadmin']], function () {
    Route::get('/admin', 'Admin\AdminHomeController@index');
    Route::resource('/admin/user', 'Admin\UserController');
    Route::get('/admin/showusers', 'Admin\UserController@showUsers');
    Route::get('/admin/deleteuser/{id}', 'Admin\UserController@destroy');

    Route::resource('/admin/category', 'Admin\CategoryController');
    Route::get('/admin/showcategory', 'Admin\CategoryController@showCategory');
    Route::get('/admin/adduserstocategory', 'Admin\CategoryController@adduserstocategory');
});
Route::group(['middleware' => ['iscandidate']], function () {
    Route::get('/candidate', 'Candidate\CandidateHomeController@index');
});


