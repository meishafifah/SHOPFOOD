<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\VoucherController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('', [HomeController::class, 'index'])->middleware('RedirectRestaurant')->name('index');

Route::get('restaurant/show/{restaurant:slug}', [RestaurantController::class, 'show'])->name('restaurant.show');

Route::middleware('auth')->group(function(){
    
    Route::middleware('CheckMaster')->group(function(){
        Route::prefix('restaurant')->group(function(){
            Route::get('create', [RestaurantController::class, 'create'])->name('restaurant.create');
            Route::post('store', [RestaurantController::class, 'store'])->name('restaurant.store');
            
            Route::get('edit/{restaurant:slug}', [RestaurantController::class, 'edit'])->name('restaurant.edit');
            Route::put('update/{restaurant:slug}', [RestaurantController::class, 'update'])->name('restaurant.update');
            Route::delete('delete/{restaurant:slug}', [RestaurantController::class, 'delete'])->name('restaurant.delete');
        });

        Route::prefix('voucher')->group(function(){
            Route::get('create', [VoucherController::class, 'create'])->name('voucher.create');
            Route::post('store', [VoucherController::class, 'store'])->name('voucher.store');
            
            Route::get('edit/{voucher:id}', [VoucherController::class, 'edit'])->name('voucher.edit');
            Route::put('update/{voucher:id}', [VoucherController::class, 'update'])->name('voucher.update');
            Route::delete('delete/{voucher:id}', [VoucherController::class, 'delete'])->name('voucher.delete');
        });
    });


    Route::middleware('CheckMasterOrAdmin')->group(function(){
        Route::prefix('menu')->group(function(){
            Route::get('create/{restaurant:slug}', [MenuController::class, 'create'])->name('menu.create');
            Route::post('store/{restaurant:slug}', [MenuController::class, 'store'])->name('menu.store');

            Route::get('edit/{menu:id}', [MenuController::class, 'edit'])->name('menu.edit');
            Route::put('update/{menu:id}', [MenuController::class, 'update'])->name('menu.update');
            Route::delete('delete/{menu:id}', [MenuController::class, 'delete'])->name('menu.delete');
        });

        Route::get('voucher', [VoucherController::class, 'index'])->name('voucher.index');

    });

    Route::prefix('request')->group(function(){
        Route::get('create', [RequestController::class, 'create'])->name('request.create');
        Route::post('store', [RequestController::class, 'store'])->name('request.store');

        Route::middleware('CheckMaster')->group(function(){
            Route::get('', [RequestController::class, 'index'])->name('request.index');
            Route::put('approve/{restaurant:id}', [RequestController::class, 'approve'])->name('request.approve');
            Route::put('decline/{restaurant:id}', [RequestController::class, 'decline'])->name('request.decline');
        });
    });

    Route::prefix('account')->group(function(){
        Route::get('', [AccountController::class, 'index'])->name('account.index');
    });

});
