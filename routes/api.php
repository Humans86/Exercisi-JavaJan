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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('list','\App\Http\Controllers\api\ListController')->only(['index','show']);

Route::get('list/{category}/category','\App\Http\Controllers\api\ListController@category');
Route::get('list/{url}/url','\App\Http\Controllers\api\ListController@url');


Route::get('category','\App\Http\Controllers\api\CategoryController@index');
Route::get('category/all','\App\Http\Controllers\api\CategoryController@all');

Route::post('contact','\App\Http\Controllers\api\ContactController@store');
