<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductCharacteristicController;

Route::name('sait.')
    ->group(function(){
        Route::get('/', [MainController::class, 'homePage'])->name('home');
        Route::get('test-xml', [MainController::class, 'getXmlTest']);
        Route::get('/1', [CategoryController::class, 'importFromXml']);
        Route::get('/2', [ProductController::class, 'importFromXml']);
    });
// Маршруты для категорий
Route::resource('categories', CategoryController::class);

// Маршруты для продуктов
Route::resource('products', ProductController::class);

// Маршруты для характеристик продуктов
Route::resource('product-characteristics', ProductCharacteristicController::class);
Auth::routes();

Route::prefix('administrator')
    ->middleware('auth', 'role:admin')
    ->name('admin.')
    ->group(function(){
        Route::get('/', function() {
            return 'Administrator Panel';
        });
    });
