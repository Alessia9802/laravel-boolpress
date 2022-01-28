<?php

use Illuminate\Support\Facades\Auth;
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

    return view('guest.welcome');
})->name('home');

Route::resource('posts', PostController::class)->only(['index', 'show'])->parameter('post', 'id');


Auth::routes(['register' => false]);


Route::middleware('auth')->prefix('admin')->namespace('Admin')->name('admin.')->group(function(){
    //Route::get('/', 'HomeController@index')->name('index');
    Route::get('/', 'HomeController@index')->name('dashboard');
    Route::resource('posts', PostController::class);
});
