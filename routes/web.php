<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

Route::get('/', 'SettingsController@selectMoodleUrl');

Route::post('/', 'SettingsController@addMoodleSettings');

Route::get('/endpoint', 'SettingsController@selectEndpointUrl');

Route::post('/endpoint', 'SettingsController@addEndpointSettings');

Route::get('/up', 'UpController@up');

// Route::get('/unenrol', 'UpController@unenrol');

Route::get('/dataview', 'DownController@download');

// Check if active csv 
Route::get('/import', function(){
    
    $active = scandir('../public/uploads', 1); // Check active file
    
    $status = $active[0]; // Convert to string 

    return view('import', compact('status'));
});

Route::post('/import','ImportController@import');

Route::get('/functions', 'FunctionController@handleData');

Route::post('/functions', 'FunctionController@handleData');





