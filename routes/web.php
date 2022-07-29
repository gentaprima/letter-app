<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
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

Route::group(['middleware' => 'check.login', 'prefix' => '/dashboard'], function () {
    Route::get('/beranda', 'DashboardController@index');
    Route::get('/', 'DashboardController@index');
    //Route users
    Route::get('/data-pengguna', 'UsersController@index');
    Route::get('/profile', 'UsersController@profile');
    Route::post('/users', 'UsersController@store');
    Route::post('/users/{id}', 'UsersController@update');
    Route::get('/users/{id}', 'UsersController@destroy');
    Route::get('/users/auth/logout', 'UsersController@logout');

    //Route letter
    Route::get("/surat/tambah/{type}", "LetterController@add");
    Route::post("/surat/tambah/{type}", "LetterController@store");

    Route::get("/surat/{type}", "LetterController@index");
    Route::get("/surat/hapus/{id}", "LetterController@destroy");
    Route::get("/surat/detail/{id}/{type}", "LetterController@show");
    Route::post("/surat-masuk/disposisi/{id}", "LetterController@disposisi");
    Route::get('/surat/accept/{id}', 'LetterController@acceptOutLetter');
    Route::post('/arsip', 'ArsipController@store');
    Route::get('/arsip', 'ArsipController@index');

    //Route Instance
    Route::get("/instansi", "InstansiController@index");
    Route::post("/instansi", "InstansiController@store");
    Route::get("/instansi/{id}", "InstansiController@destroy");
    Route::post("/instansi/{id}", "InstansiController@update");


    //route report
    Route::get("/report/{type}", "LetterController@report");
    Route::get("/report/output/surat/{id}", "LetterController@reportOutput");

    Route::post("/disposisi/response/{id}", 'LetterController@addResponseDisposition');
});

// Route::middleware(['auth','checkLogin'])->group(function(){
// });