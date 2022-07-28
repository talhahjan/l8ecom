<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
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

Route::group(['as' => 'api.', 'prefix' => '/','middleware'=>'auth:sanctum'], function () {
Route::get('user/cart',[UserController::class, 'cart'])->name('user.cart');
Route::get('user/favorites',[UserController::class, 'favorites'])->name('user.favorites');
Route::get("user/profile", [UserController::class, 'profile'])->name('user.profile');
Route::post("user/profile/edit", [UserController::class, 'updateProfile'])->name('update.profile');
Route::post("logout", [AuthController::class, 'logout'])->name('logout');
});

Route::group(['as' => 'api.', 'prefix' => '/'], function () {
Route::get("sections", [ApiController::class, 'fetchSections'])->name('sections');

Route::get("product/{slug}", [ApiController::class, 'fetchProduct'])->name('product');

Route::get("section/{section}", [ApiController::class, 'fetchSection'])->name('section');
Route::get("category/{category}", [ApiController::class, 'fetchCategory'])->name('category');
Route::get("brands", [ApiController::class, 'fetchBrands'])->name('brands');
Route::get("brands/popular", [ApiController::class, 'BrandsWithLogoes'])->name('popular-brands');
Route::get("products/latest", [ApiController::class, 'getLatestProduct'])->name('latest-products');
Route::get("products/featured", [ApiController::class, 'getFeaturedProduct'])->name('featured-products');
Route::post("login", [AuthController::class, 'login'])->name('login');
Route::post("register", [AuthController::class, 'register'])->name('register');
});
