<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\WelcomeController;
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

Route::get('/', [WelcomeController::class, 'index'])->name('welcome.index');
Route::get('/product/{slug}', [WelcomeController::class, 'show']);

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    Route::group(['middleware' => 'CheckRole:Admin', 'prefix' => 'admin'], function() {
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    });
    //PRODUCTS
    Route::group(['middleware' => 'CheckRole:Admin'], function() {
        Route::resource('products', ProductController::class);
    });

    Route::group(['middleware' => 'CheckRole:Customer'], function() {
        Route::get('/home', [WelcomeController::class, 'index']);
    });
    //Reviews
    Route::group(['middleware' => 'CheckRole:Customer'], function() {
        Route::resource('reviews', ReviewController::class);
    });
});






