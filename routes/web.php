<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function(){
    return view('test.page');
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
