<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\FrontController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get("/", [FrontController::class, 'landingPage'])->name("landingPage");

Route::get("/category/{slug}", [FrontController::class, 'categoryDetails'])->name("categoryPage");
Route::get("/product/{slug}", [FrontController::class, 'productDetails'])->name("productPage");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group([
        'prefix'  => 'backend',
        'middleware' => ['auth', 'isAdmin']
    ],
    function () {
        Route::resource('user', UserController::class)->names('backend.user');
        Route::resource('slide', SlideController::class)->names('backend.slide');
        Route::resource('category', CategoryController::class)->names('backend.category');
        Route::resource('product', ProductController::class)->names('backend.product');
        Route::resource('page', PageController::class)->names('backend.page');

});
