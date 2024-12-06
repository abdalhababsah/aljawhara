<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;

// Home Route
Route::get('/menu', [HomeController::class, 'menu'])->name('home');
Route::get('/', [HomeController::class, 'index'])->name('video');

// Localization Route
Route::get('/lang/{locale}', [LocalizationController::class, 'switchLang'])->name('lang.switch');

// Admin Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::prefix('admin')->name('admin.')->group(function () {
    
    // Admin Dashboard
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Admin Authentication Routes
    
    /*
     * Users Management Routes
     */
    

    /*
     * Products Management Routes
     */
    
    // Display a listing of products
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    
    // Show the form for creating a new product
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    
    // Store a newly created product in storage
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    
    // Update the specified product in storage
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    
    // Remove the specified product from storage
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    
    /*
     * Categories Management Routes
     */
    
    // Display a listing of categories
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    
    // Show the form for creating a new category
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    
    // Store a newly created category in storage
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');

    // Update the specified category in storage
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    
    // Remove the specified category from storage
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});
});