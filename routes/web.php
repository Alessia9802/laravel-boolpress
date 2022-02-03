<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\PostResource;
use App\Post;
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

Route::get('/{any}', function () {
    return view('guest.welcome');
})->where('any', '.*');

Route::get('posts/{post}', function (Post $post) {
    return new PostResource(Post::find($post));
});



/* VUE POST */
Route::get('blog', function () {
    return view('guest.blog.index');
})->name('guest.blog.index');

Route::get('contacts', 'ContactController@show_contact_page')->name('contacts.form');
Route::post('contacts', 'ContactController@store')->name('contacts.send');

Route::resource('posts', PostController::class)->only(['index', 'show'])->parameter('post', 'slug');
Route::get('categories/{category:slug}/posts', 'CategoryController@posts')->name('categories.posts');

Route::get('tags/{tag:slug}/posts', 'TagController@posts')->name('tags.posts');

Auth::routes(['register' => true]);


Route::middleware('auth')->prefix('admin')->namespace('Admin')->name('admin.')->group(function(){
    //Route::get('/', 'HomeController@index')->name('index');
    Route::get('/', 'HomeController@index')->name('dashboard');
    Route::resource('tags', TagController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('posts', PostController::class);
});
