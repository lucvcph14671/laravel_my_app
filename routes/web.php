<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
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

Route::prefix('admin')->name('admin.')->group(function () {
   
    Route::get('/', [dashboardController::class, 'index'])->name('/');

    Route::prefix('user')->name('user.')->group(function () {
        
    });
    
});



    Route::get('/', [HomeController::class, 'index'])->name('/');

    Route::get('san-pham.html', [HomeController::class, 'product'])->name('san-pham');

    Route::get('gio-hang.html', [CartController::class, 'cart'])->name('gio-hang');

    Route::get('tin-tuc.html', [BlogController::class, 'blog'])->name('tin-tuc');

    Route::get('lien-he.html', [ContactController::class, 'contact'])->name('lien-he');

    Route::get('dang-nhap/dang-ki.html', [UserController::class, 'loginSignin'])->name('dang-nhap/dang-ki');

    // Route::prefix('/')->name('/')->group(function () {
    //     Route::get('list', [UserController::class, 'index'])->name('list');
    // });

