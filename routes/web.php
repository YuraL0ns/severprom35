<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
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
