<?php

use App\Http\Controllers\dashboardController;
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

Route::prefix('/')->name('/')->group(function () {

    Route::get('/', [ProductController::class, 'index'])->name('/');

    Route::get('san-pham', [ProductController::class, 'product'])->name('san-pham');

    Route::get('gio-hang', [ProductController::class, 'cart'])->name('gio-hang');

    // Route::prefix('/')->name('/')->group(function () {
    //     Route::get('list', [UserController::class, 'index'])->name('list');
    // });
});
