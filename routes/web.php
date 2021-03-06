<?php

use Illuminate\Support\Facades\Route;
//use app\Http\Controllers\AboutController;
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


Route::get('/about', 'AboutController@index');
Route::get('/services', 'ServiceController@index');
Route::post('/services', 'ServiceController@store');
Route::put('/services/{id}', 'ServiceController@edit');
