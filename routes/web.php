<?php

use App\Http\Controllers\BundleController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::redirect('/', '/dashboard');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// dashboard routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::get('/users', [UserController::class, 'index'])->name('users');

    Route::get('/customers', [CustomerController::class, 'index'])->name('customers');
    Route::get('/customers/form/{id?}', [CustomerController::class, 'form'])->name('customers.form');
    Route::post('/customers/save', [CustomerController::class, 'save'])->name('customers.save');

    Route::get('/employees', [EmployeeController::class, 'index'])->name('employees');
    Route::get('/employees/form/{id?}', [EmployeeController::class, 'form'])->name('employees.form');
    Route::post('/employees/save', [EmployeeController::class, 'save'])->name('employees.save');

    Route::get('/orders', [OrderController::class, 'index'])->name('orders');
    Route::get('/orders/form/{id?}', [OrderController::class, 'form'])->name('orders.form');
    Route::post('/orders/save', [OrderController::class, 'save'])->name('orders.save');

    Route::get('/products', [ProductController::class, 'index'])->name('products');
    Route::get('/products/form/{id?}', [ProductController::class, 'form'])->name('products.form');
    Route::post('/products/save', [ProductController::class, 'save'])->name('products.save');

    Route::get('/inventories', [InventoryController::class, 'index'])->name('inventories');
    Route::get('/inventories/form/{id?}', [InventoryController::class, 'create'])->name('inventories.form');
    Route::post('/inventories/save', [InventoryController::class, 'store'])->name('inventories.save');
    Route::delete('/inventories/delete/{id}', [InventoryController::class, 'destroy'])->name('inventories.delete');

    Route::get('/bundles', [BundleController::class, 'index'])->name('bundles');
    Route::get('/bundles/form/{id?}', [BundleController::class, 'create'])->name('bundles.form');
    Route::post('/bundles/save', [BundleController::class, 'store'])->name('bundles.save');
    Route::delete('/bundles/delete/{id}', [BundleController::class, 'destroy'])->name('bundles.delete');

});
