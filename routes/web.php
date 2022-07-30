<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
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
        
        Route::get('profile', [UserController::class, 'profile'])->name('profile');
        Route::get('list-user', [UserController::class, 'listUser'])->name('list-user');

    });
    
    Route::prefix('product')->name('product.')->group(function () {
        
        Route::get('list-product', [ProductController::class, 'listProduct'])->name('list-product');
        Route::get('form-product', [ProductController::class, 'fromProduct'])->name('form-product');
        Route::get('category-product', [CategoryController::class, 'fromProduct'])->name('category-product');

    });

    Route::prefix('category')->name('category.')->group(function () {
        
        Route::get('form-category', [CategoryController::class, 'formCategory'])->name('form-category');
        Route::post('add-category', [CategoryController::class, 'addCategory'])->name('add-category');
        Route::delete('destroy-category/{id}', [CategoryController::class, 'destroy'])->name('destroy-category');
        Route::get('edit-category/{id}', [CategoryController::class, 'edit'])->name('edit-category');
        Route::put('update-category/{id}', [CategoryController::class, 'update'])->name('update-category');

    });
});



    Route::get('/', [HomeController::class, 'index'])->name('/');

    Route::get('san-pham', [HomeController::class, 'product'])->name('san-pham');

    Route::get('san-pham-chi-tiet', [HomeController::class, 'productDetail'])->name('san-pham-chi-tiet');

    Route::get('gio-hang', [CartController::class, 'cart'])->name('gio-hang');

    Route::get('tin-tuc', [BlogController::class, 'blog'])->name('tin-tuc');

    Route::get('lien-he', [ContactController::class, 'contact'])->name('lien-he');

    Route::get('dang-nhap/dang-ki', [UserController::class, 'loginSignin'])->name('dang-nhap/dang-ki');

    // Route::prefix('/')->name('/')->group(function () {
    //     Route::get('list', [UserController::class, 'index'])->name('list');
    // });

