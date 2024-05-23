<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TestingController;


Route::name('sait.')
    ->group(function () {
        Route::get('/1', [CategoryController::class, 'importFromXmlGruz']); // Import Categpories Gruz
        Route::get('/2', [CategoryController::class, 'importFromXmlSklad']); // Import Categpories Sklad
        Route::get('/3', [ProductController::class, 'importFromXmlGruz']);  // Import Products Gruz
        Route::get('/4', [ProductController::class, 'importFromXmlSklad']);  // Import Products Skald
        // Delete befeore production version

        Route::get('/', [ShopController::class, 'main_page'])->name('home');
        Route::get('/categories/{categories}', [ShopController::class, 'categories'])->name('categories');
        Route::get('/category/{code}', [ShopController::class, 'category'])->name('category');
        Route::get('/product/{id}', [ShopController::class, 'product'])->name('product');
        Route::get('/basket', [ShopController::class, 'basket'])->name('basket');
        Route::post('/basket/add/{productId}', [ShopController::class, 'addProductToBasket'])->name('add.to.basket');
        Route::get('user', [TestingController::class, 'user'])->name('profile');


        // Route::get('/', [ShopController::class, 'main_page'])->name('home');
        // Route::get('/categories', [ShopController::class, 'categories'])->name('categories');
        // Route::get('/category/{code}', [ShopController::class,'category'])->name('category');

        // Route::get('/basket', [ShopController::class, 'basket'])->name('basket');
        // Route::get('/basket/add/{productId}', [ShopController::class, 'addProductToBasket']);
        // // Route::get('/', [TestingController::class, 'home'])->name('home');
        // // Route::get('categories', [TestingController::class, 'cats']);
        // // Route::get('categories/test', [TestingController::class, 'fullCard'])->name('item');
        // Route::get('user', [TestingController::class, 'user'])->name('profile');
        // // // Route::get('basket', [TestingController::class, 'basket'])->name('basket');
    });

Auth::routes();

Route::prefix('administrator')
    ->middleware('auth', 'role:admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', function () {
            return 'Administrator Panel';
        });
    });
