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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/anasayfa',[App::class, 'index']);
Route::get('/hak','App\Http\Controllers\App@hak');
Route::get('/app','App\Http\Controllers\App@index');
Route::get('/mysqldeneme','App\Http\Controllers\App@mysql_deneme');
