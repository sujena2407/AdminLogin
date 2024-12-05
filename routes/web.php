<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RefundController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Default route
Route::get('/', function () {
    return view('welcome');
});

// Admin Authentication Routes
Route::get('/admin/register', [AdminController::class, 'showRegister'])->name('admin.register');
Route::post('/admin/register', [AdminController::class, 'register'])->name('admin.register.submit');
Route::get('/admin/login', [AdminController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// Admin Dashboard and Profile
Route::get('/admin/dashboard', [AdminController::class, 'showDashboard'])->name('admin.dashboard');

// Sales Management
Route::prefix('admin/sales')->group(function () {
    Route::get('/', [SalesController::class, 'index'])->name('admin.sales');
    Route::get('/new-sales', [SalesController::class, 'create'])->name('admin.sales.new-sales');
    Route::post('/new-sales', [SalesController::class, 'store'])->name('admin.sales.store');  // Add this line for POST request handling
    Route::post('/update', [SalesController::class, 'updateSales'])->name('admin.sales.update');
    Route::get('/view-sales/{id}', [SalesController::class, 'viewSales'])->name('admin.view-sales');
});

// Payments Management
Route::get('/admin/payments', [PaymentController::class, 'index'])->name('admin.payments');
Route::post('/admin/payments/update', [PaymentController::class, 'updatePayments'])->name('admin.payments.update');

// Refund Management
Route::prefix('admin/refunds')->group(function () {
    Route::get('/', [RefundController::class, 'index'])->name('admin.refunds');
    Route::get('/refund-payments', [RefundController::class, 'refundPayments'])->name('admin.refund-payments');
});

// Reports
Route::prefix('admin/reports')->group(function () {
    Route::get('/collections', [ReportController::class, 'collectionsReport'])->name('admin.reports.collections');
    Route::get('/due-collections', [ReportController::class, 'dueCollectionsReport'])->name('admin.reports.due-collections');
    Route::get('/inactive-due-collections', [ReportController::class, 'inactiveDueCollectionsReport'])->name('admin.reports.inactive-due-collections');
    Route::get('/inactive-collections', [ReportController::class, 'inactiveCollectionsReport'])->name('admin.reports.inactive-collections');
    Route::get('/stock', [ReportController::class, 'stockReport'])->name('admin.reports.stock');
    Route::get('/payments', [ReportController::class, 'paymentsReport'])->name('admin.reports.payments');
    Route::get('/sales-summary', [ReportController::class, 'salesSummary'])->name('admin.reports.sales-summary');
    Route::get('/monthly-sales-summary', [ReportController::class, 'monthlySalesSummary'])->name('admin.reports.monthly-sales-summary');
    Route::get('/customer-list', [ReportController::class, 'customerList'])->name('admin.reports.customer-list');
});

// Property Management
Route::prefix('admin/property')->group(function () {
    Route::get('/company', [PropertyController::class, 'company'])->name('admin.property.company');
    Route::get('/project', [PropertyController::class, 'project'])->name('admin.property.project');
});

// Customer Management
Route::get('/admin/customer', [CustomerController::class, 'index'])->name('admin.customer');

// System Management
// Route to show user management page (both list and form)
Route::get('/admin', [UserController::class, 'create'])->name('admin.system-users');

// Route to handle form submission to add a new user
Route::post('/admin', [UserController::class, 'store'])->name('admin.store');

// User CRUD (if required)
Route::prefix('users')->group(function () {
    Route::post('/', [AdminController::class, 'store'])->name('users.store');
    Route::put('/{id}', [AdminController::class, 'update'])->name('users.update');
    Route::delete('/{id}', [AdminController::class, 'destroy'])->name('users.destroy');
});

// Additional Routes from Header
Route::get('/admin/activity', [AdminController::class, 'showActivityLog'])->name('admin.activity'); // Admin activity log
Route::get('/admin/email-log', [AdminController::class, 'showEmailLog'])->name('admin.email'); // Admin email log
Route::get('/view_sales/{id}', [SalesController::class, 'viewSales'])->name('view_sales'); // View sales

// Additional Sales Management Routes
Route::prefix('admin/sales')->group(function () {
    Route::get('/add-reservation-fee', [SalesController::class, 'addReservationFee'])->name('admin.sales.add-reservation-fee');
    Route::post('/store-reservation-fee', [SalesController::class, 'storeReservationFee'])->name('admin.sales.store-reservation-fee');
});

