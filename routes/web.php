<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
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

    Route::any('update_status/{nametable}/{id}/{status}', [AuthController::class, 'updateStatus'])->name('update_status');

    Route::prefix('user')->name('user.')->group(function () {

        Route::get('profile', [UserController::class, 'profile'])->name('profile');
        Route::get('list-user', [UserController::class, 'listUser'])->name('list-user');
        Route::put('update-user/{id}', [UserController::class, 'updateUser'])->name('update-user');
        Route::put('update-password/{id}', [UserController::class, 'updatePass'])->name('update-password');
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
        Route::post('add-product', [ProductController::class, 'addProduct'])->name('add-product');
        Route::delete('destroy-product/{id}', [ProductController::class, 'destroy'])->name('destroy-product');
        Route::get('edit-product/{id}', [ProductController::class, 'edit'])->name('edit-product');
        Route::put('update-product/{id}', [ProductController::class, 'update'])->name('update-product');
    });

    Route::prefix('category')->name('category.')->group(function () {

        Route::get('form-category', [CategoryController::class, 'formCategory'])->name('form-category');
        Route::post('add-category', [CategoryController::class, 'addCategory'])->name('add-category');
        Route::delete('destroy-category/{id}', [CategoryController::class, 'destroy'])->name('destroy-category');
        Route::get('edit-category/{id}', [CategoryController::class, 'edit'])->name('edit-category');
        Route::put('update-category/{id}', [CategoryController::class, 'update'])->name('update-category');
    });

    Route::prefix('comment')->name('comment.')->group(function () {

        Route::get('list-comment', [CommentController::class, 'index'])->name('list-comment');
        Route::delete('destroy-comment/{id}', [CommentController::class, 'destroy'])->name('destroy-comment');
        
    });

    Route::prefix('order')->name('order.')->group(function () {

        Route::get('list-order', [OrderController::class, 'index'])->name('list-order');
        Route::put('update-order/{id}', [OrderController::class, 'update'])->name('update-order');
        
    });

    
});

Route::prefix('comment')->name('comment.')->group(function () {

    Route::post('add-comment', [CommentController::class, 'store'])->name('add-comment');
    
});

Route::get('/', [HomeController::class, 'index'])->name('/');

Route::get('san-pham', [HomeController::class, 'product'])->name('san-pham');

Route::get('san-pham-chi-tiet/{id}', [HomeController::class, 'productDetail'])->name('san-pham-chi-tiet');

Route::get('gio-hang', [CartController::class, 'cart'])->name('gio-hang');

Route::any('thanh-toan', [CartController::class, 'oder'])->name('thanh-toan');

Route::any('update-quantity', [CartController::class, 'updateQuantity'])->name('update-quantity');

Route::get('add-gio-hang/{id}', [CartController::class, 'addCart'])->name('add-gio-hang');

Route::get('delete-gio-hang/{id}', [CartController::class, 'deleteCart'])->name('delete-gio-hang');

Route::get('delete-detail-cart/{id}', [CartController::class, 'deleteListCart'])->name('delete-detail-cart');

Route::get('tin-tuc', [HomeController::class, 'blog'])->name('tin-tuc');

Route::any('lien-he', [HomeController::class, 'contact'])->name('lien-he');

Route::any('lien-he-email', [HomeController::class, 'email'])->name('lien-he-email');

Route::middleware('guest')->prefix('/')->name('/')->group(function () {

    Route::get('form-dang-ki', [AuthController::class, 'formSignin'])->name('form-dang-ki');
    Route::get('form-dang-nhap', [AuthController::class, 'formlogin'])->name('form-dang-nhap');
    Route::post('dang-nhap', [AuthController::class, 'login'])->name('dang-nhap');
    Route::post('dang-ki', [AuthController::class, 'signin'])->name('dang-ki');
    Route::get('login-google', [AuthController::class, 'getLoginGoogle'])->name('login-google');
    Route::get('google/callback', [AuthController::class, 'loginGoogleCallback'])->name('google/callback');
    Route::get('login-facebook', [AuthController::class, 'getLoginFacebook'])->name('login-facebook');
    Route::get('facebook/callback', [AuthController::class, 'loginFacebookCallback'])->name('facebook/callback');
});

Route::get('dang-xuat', [AuthController::class, 'logout'])->name('dang-xuat')->middleware('auth');
