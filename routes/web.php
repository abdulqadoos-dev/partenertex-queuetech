<?php

use App\Http\Controllers\CustomerController;
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

    Route::get('/users', [\App\Http\Controllers\UserController::class, 'index'])->name('users');

    Route::get('/customers', [CustomerController::class, 'index'])->name('customers');
    Route::get('/customers/form/{id?}', [CustomerController::class, 'form'])->name('customers.form');
    Route::post('/customers/save', [CustomerController::class, 'save'])->name('customers.save');
});
