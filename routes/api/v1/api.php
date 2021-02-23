<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

//users

Route::prefix('/user')->group(function(){
Route::post('/login','App\Http\Controllers\api\v1\LoginController@login');
Route::post('/signup','App\Http\Controllers\api\v1\Signup@create');
//////////////////
Route::post('/mysql_get_deneme','App\Http\Controllers\ApiDeneme@mysqlDeneme')->middleware('auth:api');
Route::post('/mysqlInsertDeneme','App\Http\Controllers\ApiDeneme@mysqlInsertDeneme');
});
