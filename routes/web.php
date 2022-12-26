<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin/home', [App\Http\Controllers\AdminController::class, 'index'])
    ->name('admin.home')
    ->middleware('is_admin');

Route::get('user/home', [App\Http\Controllers\UserController::class, 'index'])
    ->name('user.home')
    ->middleware('is_user');

Route::get('user/transactions', [App\Http\Controllers\UserController::class, 'index'])
    ->name('user.index')
    ->middleware('is_user');

Route::post('/cart', [App\Http\Controllers\CartController::class, 'store'])->name('cart.store');
Route::patch('/cart/{cart}', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/{cart}', [App\Http\Controllers\CartController::class, 'destroy'])->name('cart.destroy');

Route::post('/transaction', [App\Http\Controllers\TransactionController::class, 'store'])->name('transaction.store');
Route::get('/transaction', [App\Http\Controllers\TransactionController::class, 'index'])->name('transaction.index');
Route::get('/transaction/{transaction}', [App\Http\Controllers\TransactionController::class, 'show'])->name('transaction.show');

Route::get('admin/itemcategories', [App\Http\Controllers\AdminController::class, 'itemcategories'])
    ->name('adminn.itemcategories')
    ->middleware('is_admin');

Route::get('admin/items', [App\Http\Controllers\AdminController::class, 'items'])
    ->name('adminn.items')
    ->middleware('is_admin');\
    
Route::get('admin/carts', [App\Http\Controllers\AdminController::class, 'carts'])
    ->name('adminn.carts')
    ->middleware('is_admin');