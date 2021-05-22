<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\ListController;

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
})->name('home');


Route::resource('dashboard/list', '\App\Http\Controllers\dashboard\ListController');
Route::post('dashboard/list/{list}/image', '\App\Http\Controllers\dashboard\ListController@image')->name('list.image');


Route::resource('dashboard/category', '\App\Http\Controllers\dashboard\CategoryController');
Route::resource('dashboard/user', '\App\Http\Controllers\dashboard\UserController');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
