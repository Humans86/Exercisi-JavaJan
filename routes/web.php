<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\ListController;
use App\Http\Controllers\dashboard\CategoryController;
use App\Mail\ContacteMailable;
use Illuminate\Support\Facades\Mail;

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

Route::post('dashboard/list/{list}/image', 'dashboard\ListController@image')->name('list.image');
Route::get('dashboard/list/image-download/{image}','dashboard\ListController@imageDownload')->name('list.image-download');
Route::delete('dashboard/list/image-delete/{image}','dashboard\ListController@imageDelete')->name('list.image-delete');
Route::post('dashboard/list/content_image', 'dashboard\ListController@contentImage');



Route::resource('dashboard/category', '\App\Http\Controllers\dashboard\CategoryController');
Route::resource('dashboard/user', '\App\Http\Controllers\dashboard\UserController');


Route::get('/', '\App\Http\Controllers\web\WebController@index')->name('index');
Route::get('/categories', '\App\Http\Controllers\web\WebController@index')->name('index');

Route::get('/detail/{id}','\App\Http\Controllers\web\WebController@detail');
Route::get('/post-category/{id}','\App\Http\Controllers\web\WebController@post_category');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//User Information
Route::get('/user/profile', [App\Http\Controllers\HomeController::class, 'userProfile'])->name('user_profile');

//Export
Route::get('/dashboard/excel/post-export', 'dashboard\ListController@export')->name('list.export');
Route::get('/dashboard/excel/post-exportCSV', 'dashboard\ListController@exportIntoCSV')->name('list.exportIntoCSV');

//pdf
Route::get('/dashboard/pdf',  'dashboard\CategoryController@pdf')->name('descarregarPDF');

//Contacte
Route::get('/contact','\App\Http\Controllers\web\WebController@contact');


