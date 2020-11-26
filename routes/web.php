<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
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

Route::view('/', 'welcome')->name('welcome');

Route::middleware('auth', 'verified')->group(function () {
	Route::view('dashboard', 'dashboard')->name('dashboard');
	Route::view('profile', 'profile')->name('profile');

	Route::resource('post', PostController::class);
	Route::get('cari-post', [PostController::class,'search'])->name('search');

	Route::resource('category', CategoryController::class);
	Route::get('cari-kategori', [CategoryController::class,'search'])->name('search');

	Route::resource('tag', TagController::class);
	Route::get('cari-tag', [TagController::class,'search'])->name('search');

	// Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
	// 	\UniSharp\LaravelFilemanager\Lfm::routes();
	// });

});
