<?php

use Illuminate\Support\Facades\Route;

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

// Route::prefix("/",function(){})
Route::get('/', 'LoginController@index');
Route::post('/', 'LoginController@checkLogin');

Route::group(['middleware' => 'check.login','prefix'=>'/dashboard'], function () {
    Route::get('/beranda', 'DashboardController@index');
    Route::get('/', 'DashboardController@index');
    
    //Route users
    Route::get('/data-pengguna', 'UsersController@index');
    Route::get('/profile', 'UsersController@profile');
    Route::post('/users', 'UsersController@store');
    Route::post('/users/{id}', 'UsersController@update');
    Route::get('/users/{id}', 'UsersController@destroy');

    //Route letter
    Route::get("/surat-masuk", "LetterInController@index");
    Route::get("/surat-keluar", "LetterOutController@index");

    //Route Instance
    Route::get("/instansi", "InstansiController@index");
    Route::post("/instansi", "InstansiController@store");
    Route::get("/instansi/{id}", "InstansiController@destroy");
    Route::post("/instansi/{id}", "InstansiController@update");
});

// Route::middleware(['auth','checkLogin'])->group(function(){
// });