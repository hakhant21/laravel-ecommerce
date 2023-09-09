<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\Products\EditController;
use App\Http\Controllers\Admin\Products\IndexController;
use App\Http\Controllers\Admin\Products\CreateController;
use App\Http\Controllers\Admin\Products\DeleteController;
use App\Http\Controllers\Admin\Products\StoreController;
use App\Http\Controllers\Admin\Products\UpdateController;

Route::prefix('products')->name('products:')->group(function(){
    Route::get('/', IndexController::class)->name('all');
    Route::get('/create', CreateController::class)->name('create');
    Route::post('/store', StoreController::class)->name('store');
    Route::get('/edit/{product}', EditController::class)->name('edit');
    Route::put('/update/{product}', UpdateController::class)->name('update');
    Route::delete('/delete/{product}', DeleteController::class)->name('delete');
});
