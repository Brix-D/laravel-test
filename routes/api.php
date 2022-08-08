<?php

use App\Http\Controllers\ArticleController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('articles', 'ArticleController');

Route::apiResource('users', 'UserController');

Route::get('/linked-users', 'UserController@getLinkedUsers')->name('getLinkedUsers');
Route::get('/link-user/{id}', 'UserController@linkUser')->name('linkUser');
Route::get('/unlink-user/{id}', 'UserController@unlinkUser')->name('unlinkUser');
