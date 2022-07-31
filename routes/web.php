<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SizeController;
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

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
   
    Route::get('/', [dashboardController::class, 'index'])->name('/');

    Route::prefix('user')->name('user.')->group(function () {
        
        Route::get('profile', [UserController::class, 'profile'])->name('profile');
        Route::get('list-user', [UserController::class, 'listUser'])->name('list-user');

    });

    Route::prefix('color')->name('color.')->group(function () {
        
        Route::get('form-color', [ColorController::class, 'formColor'])->name('form-color');
        Route::post('add-color', [ColorController::class, 'addColor'])->name('add-color');
        Route::delete('destroy-color/{id}', [ColorController::class, 'destroy'])->name('destroy-color');
        Route::get('edit-color/{id}', [ColorController::class, 'edit'])->name('edit-color');
        Route::put('update-color/{id}', [ColorController::class, 'update'])->name('update-color');

    });

    Route::prefix('size')->name('size.')->group(function () {
        
        Route::get('form-size', [SizeController::class, 'formSize'])->name('form-size');
        Route::post('add-size', [SizeController::class, 'addSize'])->name('add-size');
        Route::delete('destroy-size/{id}', [SizeController::class, 'destroy'])->name('destroy-size');
        Route::get('edit-size/{id}', [SizeController::class, 'edit'])->name('edit-size');
        Route::put('update-size/{id}', [SizeController::class, 'update'])->name('update-size');

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

    Route::middleware('guest')->prefix('/')->name('/')->group(function () {

        Route::get('dang-nhap/dang-ki', [AuthController::class, 'loginSignin'])->name('dang-nhap/dang-ki');
        Route::post('dang-nhap', [AuthController::class, 'login'])->name('dang-nhap');
        
    });

    Route::get('dang-xuat', [AuthController::class, 'logout'])->name('dang-xuat')->middleware('auth');

