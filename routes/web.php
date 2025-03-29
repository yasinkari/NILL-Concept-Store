<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminMiddleware;

// Public Routes
Route::get('/', function () {
    return view('customer.dashboard'); // Update path to match new location
});



Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/payment', function () {return view('customer.payment');})->name('payment');
Route::get('/about', function () {return view('customer.about');})->name('about');
// Add this with your other customer routes
Route::get('/contact', function () {
    return view('customer.contact');
})->name('contact');


// Forgot Password Routes
Route::get('password/forgot', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('password/email', [AuthController::class, 'handleForgotPassword'])->name('password.email');

// Reset Password Routes
Route::get('password/reset/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('password/reset', [AuthController::class, 'resetPassword'])->name('password.update');

// Change Password Route
Route::get('password/change', [AuthController::class, 'showChangePasswordForm'])->name('auth.change-password-form');
Route::post('password/change', [AuthController::class, 'changePassword'])->name('auth.change-password');

// Admin Authentication Routes (Unprotected)
Route::get('admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'login'])->name('admin.login.post');

// Admin Routes (Protected by AdminMiddleware)
Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('admin/register', [AdminController::class, 'showRegisterForm'])->name('admin.register');
    Route::post('admin/register', [AuthController::class, 'registerAdmin'])->name('admin.register.post');
});


// Admin Product 
Route::get('/admin/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/admin/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/admin/products', [ProductController::class, 'store'])->name('products.store');
Route::patch('/admin/products/{product}/toggleVisibility', [ProductController::class, 'toggleVisibility'])->name('products.toggleVisibility');
Route::patch('/admin/products/{product}/toggleStatus', [ProductController::class, 'toggleStatus'])->name('products.toggleStatus');
Route::delete('/admin/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');


// Correct route for editing a product
Route::get('/admin/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/admin/products/{product}', [ProductController::class, 'update'])->name('products.update');


//customer display product
Route::get('/products', [ProductController::class, 'showToCustomer'])->name('products.customer');
Route::get('/payment', function () {
    return view('customer.payment');
})->name('payment');
Route::get('/about', function () {
    return view('customer.about');
})->name('about');
Route::get('/contact', function () {
    return view('customer.contact');
})->name('contact');
