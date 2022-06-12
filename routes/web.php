<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RestaurantController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('', [HomeController::class, 'index'])->name('index');
Route::get('restaurant/show/{restaurant:slug}', [RestaurantController::class, 'show'])->name('restaurant.show');

Route::middleware('auth')->group(function(){

    Route::middleware('CheckMaster')->group(function(){
        
        Route::prefix('restaurant')->group(function(){
            Route::get('create', [RestaurantController::class, 'create'])->name('restaurant.create');
            Route::post('store', [RestaurantController::class, 'store'])->name('restaurant.store');
            Route::get('edit', [RestaurantController::class, 'edit'])->name('restaurant.edit');
            Route::put('update', [RestaurantController::class, 'update'])->name('restaurant.update');
            Route::delete('delete', [RestaurantController::class, 'delete'])->name('restaurant.delete');
        });
        
    });


    Route::middleware('CheckAdmin')->group(function(){

    });

});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
