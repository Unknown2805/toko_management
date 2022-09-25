<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

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

Route::get('/', function () {
    return view('auth.login');
});


Route::controller(App\Http\Controllers\ProductController::class)
    ->prefix('/product')
    ->group(function(){
            Route::get('/','index');
            Route::post('/add','store');
            Route::put('/edit/{id}', 'edit');
            Route::delete('/delete/{id}', 'destroy');

    });

Route::controller(App\Http\Controllers\CategoryController::class)
    ->prefix('/category')
    ->group(function(){
            Route::get('/','index');
            Route::post('/add','store');
            Route::put('/edit/{id}', 'edit');
            Route::delete('/delete/{id}', 'destroy');

    });

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);
