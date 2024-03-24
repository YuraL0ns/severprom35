<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;

Route::name('sait.')
    ->group(function(){
        Route::get('/', [MainController::class, 'homePage'])->name('home');
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
