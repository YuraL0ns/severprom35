<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductCharacteristicController;

use App\Http\Controllers\TestingController;

Route::name('sait.')
    ->group(function(){
//        Route::get('/', [MainController::class, 'homePage'])->name('home');
//        Route::get('/1', [CategoryController::class, 'importFromXml']);
//        Route::get('/2', [ProductController::class, 'importFromXml']);
//        Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
//        Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');
//        Route::get('/categories/{id}/{article}', [ProductController::class, 'show'])->name('products.show');
        Route::get('/', [TestingController::class, 'home'])->name('home');
//        Route::get('categories', [TestingController::class, 'cats']);
        Route::get('categories/test', [TestingController::class, 'fullCard'])->name('item');
        Route::get('user', [TestingController::class, 'user'])->name('profile');
        Route::get('basket', [TestingController::class, 'basket'])->name('basket');
        Route::get('page', [TestingController::class, 'pages'])->name('page');
    });




Auth::routes();

Route::prefix('administrator')
    ->middleware('auth', 'role:admin')
    ->name('admin.')
    ->group(function(){
        Route::get('/', function() {
            return 'Administrator Panel';
        });
    });
