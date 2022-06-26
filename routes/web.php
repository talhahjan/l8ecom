<?php

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


use App\Category;
use App\Product;

Auth::routes();



Route::group(['as' => 'user.', 'prefix' => '/', 'middleware' => 'auth'], function () {
    Route::get('', [App\Http\Controllers\HomeController::class, 'index'] )->name('home');
    Route::get('product/{product}', [App\Http\Controllers\ProductController::class,'single'])->name('single');
    Route::get('collection/{collection}', [App\Http\Controllers\CategoryController::class,'collection'])->name('collection');
    });
    
    
    
    Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
        Route::resource('user', App\Http\Controllers\UserController::class);
        Route::resource('category',  App\Http\Controllers\CategoryController::class);
        Route::resource('brand',  App\Http\Controllers\BrandController::class);
        Route::resource('product',  App\Http\Controllers\ProductController::class);
        Route::resource('section',  App\Http\Controllers\SectionController::class);
        Route::post('thumbnail/destroy', [App\Http\Controllers\ThumbnailController::class,'destroy'])->name('thumbnail.destroy');
        Route::get('extras',[App\Http\Controllers\AdminController::class,'loadExtras'] )->name('product.extras');
        Route::post('category/changestatus', [App\Http\Controllers\CategoryController::class,'changeStatus'])->name('category.changestatus');
        Route::post('users/changestatus', [App\Http\Controllers\UserController::class,'changeStatus'])->name('user.changestatus');
        Route::post('product/changestatus', [App\Http\Controllers\ProductController::class,'changeStatus'])->name('product.changestatus');
        Route::post('section/changestatus',[App\Http\Controllers\SectionController::class,'changeStatus'] )->name('section.changestatus');
        Route::get('deleteimg', [App\Http\Controllers\AdminController::class,'deleteImage'])->name('delete.image');
        Route::get('profile', [App\Http\Controllers\AdminController::class,'viewProfile'])->name('profile');
        Route::get('setting/', [App\Http\Controllers\AdminController::class,'setting'])->name('setting');
        Route::get('/', [App\Http\Controllers\AdminController::class,'dashboard'])->name('dashboard');
    });
    
    Route::get('/login/{provider}', [App\Http\Controllers\Auth\SocialController::class,'redirect'])->where('provider', 'facebook|google');
    Route::get('/login/{provider}/callback', [App\Http\Controllers\Auth\SocialController::class,'callback'])->where('provider', 'facebook|google');
    




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
