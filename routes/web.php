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

Route::group(['prefix'=>'/dashboard'], function () {
    Route::get('/data-pengguna', 'UsersController@index');
    Route::get('/beranda', 'DashboardController@index');
    Route::get('/profile', 'UsersController@profile');
    Route::post('/add-users', 'UsersController@store');
    Route::post('/update-users/{id}', 'UsersController@update');
    Route::get('/delete-users/{id}', 'UsersController@destroy');
    Route::get("/surat-masuk", "LetterInController@index");
    Route::get("/surat-keluar", "LetterOutController@index");
    Route::get("/instansi", "InstansiController@index");
});

// Route::middleware(['auth','checkLogin'])->group(function(){
// });