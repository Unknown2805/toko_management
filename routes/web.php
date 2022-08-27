<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupplierController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::controller(App\Http\Controllers\SupplierController::class)
    ->prefix('/supplier')
    ->group(function(){
            Route::get('/','index');
         
    });

Route::controller(App\Http\Controllers\ProductController::class)
    ->prefix('/product')
    ->group(function(){
            Route::get('/in','in');
         
    });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
