<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Categories\EditController;
use App\Http\Controllers\Admin\Categories\IndexController;
use App\Http\Controllers\Admin\Categories\CreateController;
use App\Http\Controllers\Admin\Categories\DeleteController;
use App\Http\Controllers\Admin\Categories\StoreController;
use App\Http\Controllers\Admin\Categories\UpdateController;

Route::prefix('categories')->name('categories:')->group(function(){
    Route::get('/', IndexController::class)->name('all');
    Route::get('/create', CreateController::class)->name('create');
    Route::post('/store', StoreController::class)->name('store');
    Route::get('/edit/{category}', EditController::class)->name('edit');
    Route::put('/update/{category}', UpdateController::class)->name('update');
    Route::delete('/delete/{category}', DeleteController::class)->name('delete');
});
