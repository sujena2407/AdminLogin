<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/register', [AdminController::class, 'showRegister'])->name('admin.register');
Route::post('/admin/register', [AdminController::class, 'register'])->name('admin.register.submit');


Route::get('/admin/login', [AdminController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');

Route::get('/admin/dashboard', [AdminController::class, 'showDashboard'])->name('admin.dashboard');
Route::get('/admin/profile', [AdminController::class, 'showProfile'])->name('admin.profile');
Route::post('/admin/profile', [AdminController::class, 'updateProfile'])->name('admin.profile.update');


Route::prefix('admin/sales')->group(function () {
    Route::get('/', [SalesController::class, 'index'])->name('admin.sales');
    Route::post('/', [SalesController::class, 'updateSales'])->name('admin.sales.update');
    Route::get('new-sales', [SalesController::class, 'create'])->name('admin.new-sales');
});


Route::get('/admin/payments', [PaymentController::class, 'index'])->name('admin.payments');
Route::post('/admin/payments', [PaymentController::class, 'updatePayments'])->name('admin.payments.update');


Route::prefix('admin/refunds')->group(function () {
    Route::get('/', [RefundController::class, 'index'])->name('admin.refunds');
    Route::get('refund-payments', [RefundController::class, 'refundPayments'])->name('admin.refund-payments');
});


Route::prefix('admin/reports')->group(function () {
    Route::get('collections', [ReportController::class, 'collectionsReport'])->name('admin.reports.collections');
    Route::get('stock', [ReportController::class, 'stockReport'])->name('admin.reports.stock');
    Route::get('payments', [ReportController::class, 'paymentsReport'])->name('admin.reports.payments');
});


Route::prefix('admin/system')->group(function () {
    Route::get('users', [SystemController::class, 'userManagement'])->name('admin.system.users');
    Route::get('settings', [SystemController::class, 'settings'])->name('admin.system.settings');
});


Route::get('/admin/user', [AdminController::class, 'showUserList'])->name('admin.user');
Route::post('/users', [AdminController::class, 'store'])->name('users.store');
Route::put('/users/{id}', [AdminController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [AdminController::class, 'destroy'])->name('users.destroy');

Route::put('/users/{id}', [AdminController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [AdminController::class, 'destroy'])->name('users.destroy');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');