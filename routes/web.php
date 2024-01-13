<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ExportController;

Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('login', [AuthController::class, 'login'])->name('login');

Route::get('/', [AuthController::class, 'index'])->name('auth.index');
Route::middleware(['AuthMiddleware'])->group(function () {
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::get('/profile', [UserController::class, 'index'])->name('profile.index');
    Route::post('store', [ProductController::class, 'store'])->name('store');
    Route::get('/create', [ProductController::class, 'create'])->name('create');
    Route::get('/edit/{id}', [ProductController::class, 'show'])->name('show');
    Route::put('/update/{id}', [ProductController::class, 'update'])->name('update');
    Route::delete('delete/{id}', [ProductController::class, 'destroy'])->name('destroy');
    Route::get('/export-excel', [ExportController::class, 'exportExcel'])->name('export-excel');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});


Route::get('/', function () {
    return view('login');
});
