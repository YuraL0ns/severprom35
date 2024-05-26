<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OrderController;
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
        // Route::get('/categories/{code}', [ShopController::class, 'categories'])->name('categories');
        Route::get('/category/{code}', [ShopController::class, 'category'])->name('category');
        Route::get('/product/{id}', [ShopController::class, 'product'])->name('product');
        Route::get('/baskets', [ShopController::class, 'clearCart']);
        Route::get('/basket', [ShopController::class, 'basket'])->name('basket');
        Route::post('/basket/add/{productId}', [ShopController::class, 'addProductToBasket'])->name('add.to.basket');
        Route::post('/basket/update/{productId}/{quantity}', [ShopController::class, 'updateProductInBasket'])->name('update.to.basket');
        Route::post('/basket/remove/{productId}', [ShopController::class, 'removeProductInBasket'])->name('remove.to.basket');
        Route::get('/basket/checkout', [ShopController::class, 'showCheckoutForm'])->name('order.checkout.form');
        Route::post('/basket/checkout', [ShopController::class, 'checkout'])->name('order.checkout');
        Route::get('/order-confirmed/{order}', function($orderId) {
            $order = \App\Models\Order::findOrFail($orderId);
            return view('templa.basket.success', compact('order'));

        })->name('order.success');
        Route::get('user', [TestingController::class, 'user'])->name('profile');
    });

Auth::routes();

Route::get('/dashboard', [AdminController::class, 'main_page'])->name('admin.dashboard');
Route::get('/dashboard/categories', [AdminController::class, 'pages_categories'])->name('admin.dashboard.categories');
Route::get('/dashboard/import', [AdminController::class, 'showFormForImport'])->name('admin.dashboard.import');
Route::post('/dashboard/import/file', [AdminController::class, 'getFromFile'])->name('admin.dashboard.file');
Route::post('/dashboard/import/url', [AdminController::class, 'getFromUrl'])->name('admin.dashboard.url');

Route::prefix('dashboard')->name('admin.')->group(function () {
    Route::resource('orders', OrderController::class);
    Route::get('orders/search', [OrderController::class, 'search'])->name('orders.search');
    Route::patch('orders/{order}/update_status', [OrderController::class,'update_status'])->name('orders.update_status');
    Route::patch('orders/{order}/update', [OrderController::class,'updateOrder'])->name('orders.update');
    Route::post('orders/{order}/update-item/{item}', [OrderController::class,'updateOrderItem'])->name('orders.items.update');
    Route::post('orders/{order}/add-product', [OrderController::class, 'addProductToOrder'])->name('orders.add_product');

});


// Route::prefix('dashboard')
//         ->middleware('auth', 'role:admin')
//         ->name('admin.')
//         ->group(function () {
//     Route::get('/', function () {
//         return 'Administrator Panel';
//     });
// });

