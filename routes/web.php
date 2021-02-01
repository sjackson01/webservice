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

Route::get('/', 'IndexController@index');

Route::get('/enrol', 'UpController@enrol');

Route::get('/unenrol', 'UpController@unenrol');

Route::get('/down', 'DownController@download');

Route::get('/functions', 'DatabaseController@displayFunctions');
