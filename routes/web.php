<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ProfileController;


// Auth Controllers
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// Admin Controllers
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\FeedbackController as AdminFeedbackController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
});

Route::middleware('auth')->group(function () {
    Route::get('/orders', [OrdersController::class, 'index'])->name('orders.index');
    Route::get('/orders/{id}', [OrdersController::class, 'show'])->name('orders.show');
    Route::post('/orders/{id}/confirm', [OrdersController::class, 'confirm'])->name('orders.confirm');

    Route::post('/orders/{order}/confirm-payment', [OrderController::class, 'confirmPayment'])
    ->name('orders.confirmPayment');

});
Route::post('/orders/{id}/cancel', [OrdersController::class, 'cancel'])->name('orders.cancel');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');

Route::middleware('auth')->group(function () {
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
    Route::get('/payment/{order}', [PaymentController::class, 'show'])->name('payment.show');
    Route::post('/payment/{order}', [PaymentController::class, 'pay'])->name('payment.pay');
    Route::get('/invoice/{order_id}', [InvoiceController::class, 'show'])->name('invoice.show');

    Route::post('/orders/{id}/send-invoice', [InvoiceController::class, 'sendInvoice'])->name('orders.sendInvoice');

    Route::post('/feedbacks', [FeedbackController::class, 'store'])->middleware('auth')->name('feedbacks.store');
    Route::post('/products/{product}/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
});
    Route::get('/orders/{id}/invoice', [InvoiceController::class, 'invoice'])
    ->name('orders.invoice');

// Untuk admin
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::get('/users/create', [AdminUserController::class, 'create'])->name('admin.users.create');
    Route::post('/users', [AdminUserController::class, 'store'])->name('admin.users.store');

    Route::resource('/products', AdminProductController::class)->names('admin.products');
    Route::resource('/users', AdminUserController::class)->names('admin.users');
    Route::resource('/orders', AdminOrderController::class)->names('admin.orders');
    Route::resource('/categories', AdminCategoryController::class)->names('admin.categories');
    Route::resource('/feedbacks', AdminFeedbackController::class)->names('admin.feedbacks');

    Route::post('/orders/{id}/send-invoice', [InvoiceController::class, 'sendInvoice'])->name('admin.orders.sendInvoice');

    Route::post('/orders/{order}/accept', [AdminOrderController::class, 'accept'])->name('admin.orders.accept');
    Route::post('/orders/{order}/reject', [AdminOrderController::class, 'reject'])->name('admin.orders.reject');
    Route::post('/orders/{id}/ship', [AdminOrderController::class, 'ship'])->name('admin.orders.ship');
});