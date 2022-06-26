<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;
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
Route::get("getuserinfo", [ApiController::class, 'getUserInfo'])->name('userinfo');
Route::post("logout", [ApiController::class, 'logout'])->name('logout');

});

Route::group(['as' => 'api.', 'prefix' => '/'], function () {
Route::get("sections", [ApiController::class, 'fetchSections'])->name('sections');
Route::get("product/{slug}", [ApiController::class, 'fetchProduct'])->name('product');
Route::get("section/{section}", [ApiController::class, 'fetchSection'])->name('section');
Route::get("category/{category}", [ApiController::class, 'fetchCategory'])->name('category');
Route::get("brands", [ApiController::class, 'fetchBrands'])->name('brands');
Route::post("login", [ApiController::class, 'login'])->name('login');
Route::post("register", [ApiController::class, 'register'])->name('register');
});
