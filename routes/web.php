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
Route::get('/transaction/print', [App\Http\Controllers\TransactionController::class, 'print'])->name('transaction.print');

Route::get('admin/itemcategories', [App\Http\Controllers\AdminController::class, 'itemcategories'])
    ->name('adminn.itemcategories')
    ->middleware('is_admin');

Route::get('admin/items', [App\Http\Controllers\AdminController::class, 'items'])
    ->name('adminn.items')
    ->middleware('is_admin');
    
Route::get('admin/report', [App\Http\Controllers\AdminController::class, 'report'])
    ->name('adminn.report')
    ->middleware('is_admin');

Route::get('admin/print_transaction', [App\Http\Controllers\AdminController::class, 'print_transaction'])
    ->name('admin.print_transaction')
    ->middleware('is_admin');

Route::get('admin/report/export_transaction', [App\Http\Controllers\AdminController::class, 'export_transaction'])
    ->name('admin.report.export_transaction')
    ->middleware('is_admin');

Route::get('admin/print_item', [App\Http\Controllers\AdminController::class, 'print_item'])
    ->name('admin.print_item')
    ->middleware('is_admin');

Route::get('admin/items/export_item', [App\Http\Controllers\AdminController::class, 'export_item'])
    ->name('admin.items.export_item')
    ->middleware('is_admin');

Route::post('admin/items', [App\Http\Controllers\AdminController::class, 'submit_item'])
    ->name('admin.items.submit_item')
    ->middleware('is_admin');

Route::post('admin/report/import_transaction', [App\Http\Controllers\AdminController::class, 'import_transaction'])
    ->name('admin.report.import_transaction')
    ->middleware('is_admin');

Route::post('admin/items/import_item', [App\Http\Controllers\AdminController::class, 'import_item'])
    ->name('admin.items.import_item')
    ->middleware('is_admin');