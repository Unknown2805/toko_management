<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HistoryInController;
use App\Http\Controllers\HistoryOutController;
use App\Http\Controllers\TransactionController;


Route::get('/', function () {
    return view('auth.login');
});

Route::controller(App\Http\Controllers\ProductController::class)
->prefix('/product')
    ->group(function(){
        //in
            Route::get('/','index');
            Route::get('/pdf','product_pdf');
            Route::post('/add','store');
            Route::put('/edit/{id}', 'edit');
            Route::delete('/delete/{id}', 'destroy');

    });

Route::controller(App\Http\Controllers\ProductOutController::class)
->prefix('/product/out')
    ->group(function(){
        //out
            Route::get('','index');
            Route::put('/add/{id}','price');
            Route::put('/edit/price/{id}', 'editPrice');
            Route::put('/sell/{id}','sell');
            Route::delete('/delete/{id}', 'destroy');

    });
Route::controller(App\Http\Controllers\CategoryController::class)
->prefix('/category')
    ->group(function(){
            Route::get('/','index');
            Route::get('/pdf','category_pdf');
            Route::post('/add','store',);
            Route::put('/edit/{id}', 'edit');
            Route::delete('/delete/{id}', 'destroy');

    });

Route::controller(App\Http\Controllers\HistoryInController::class)
->prefix('/history/in')
    ->group(function(){
            Route::get('/','index');
            Route::get('/pdf','his_in_pdf');
    });
Route::controller(App\Http\Controllers\HistoryOutController::class)
->prefix('/history/out')
    ->group(function(){
            Route::get('/','index');
            Route::get('/pdf','his_out_pdf');
    });

Route::controller(App\Http\Controllers\TransactionController::class)
->prefix('/transaction')
    ->group(function(){
        Route::get('/','index');
        Route::get('/pdf','sale_pdf');
        });
Route::controller(App\Http\Controllers\DashboardController::class)
->prefix('/dashboard')
    ->group(function(){
        Route::get('/','index');
        Route::get('/view', 'view');
        Route::post('/add/profile', 'store');
        Route::put('/edit/profile/{id}', 'edit');
        Route::put('/edit/user/{id}', 'editUser');
        Route::delete('/delete/{id}', 'destroy'); 
        });

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);
