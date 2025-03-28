<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\AuthController;
// use App\Http\Controllers\LoanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
// use App\Http\Controllers\ContactController;
// use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

// // Authentication Routes
// Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
// Route::post('/register', [AuthController::class, 'register'])->name('register');
// Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
// Route::post('/login', [AuthController::class, 'login'])->name('login');
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// // Loan Simulation (Public Access)
// Route::get('/loan-simulator', [LoanController::class, 'showSimulator'])->name('loan.simulator');
// Route::post('/loan-simulator/calculate', [LoanController::class, 'calculateLoan'])->name('loan.calculate');

// // Contact Form (Public Access)
// Route::get('/contact', [ContactController::class, 'showContactForm'])->name('contact.form');
// Route::post('/contact', [ContactController::class, 'submitContact'])->name('contact.submit');

// // Authenticated User Routes
// Route::middleware('auth')->group(function () {
    // Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

//     // Loan Application
//     Route::get('/loan/apply', [LoanController::class, 'showApplicationForm'])->name('loan.apply.form');
//     Route::post('/loan/apply', [LoanController::class, 'submitApplication'])->name('loan.apply');
//     Route::get('/loan/status/{id}', [LoanController::class, 'showStatus'])->name('loan.status');

//     // Upload Supporting Documents
//     Route::post('/loan/upload-document', [LoanController::class, 'uploadDocument'])->name('loan.upload.document');

//     // Loan Details and Smart Contract
//     Route::get('/loan/{id}/details', [LoanController::class, 'showLoanDetails'])->name('loan.details'); // Status pinjaman & Smart Contract info

//     // Payment
//     Route::post('/loan/{id}/pay-installment', [LoanController::class, 'payInstallment'])->name('loan.pay.installment');

//     // Payment History
//     Route::get('/payment-history', [DashboardController::class, 'paymentHistory'])->name('payment.history');

//     // Loan Report PDF
//     Route::get('/loan/{id}/report', [LoanController::class, 'generateReport'])->name('loan.report');

//     // Blockchain Wallet Connection
//     Route::post('/wallet/connect', [DashboardController::class, 'connectWallet'])->name('wallet.connect');

//     // KYC Upload
//     Route::get('/kyc', [ProfileController::class, 'showKycForm'])->name('kyc.form');
//     Route::post('/kyc/upload', [ProfileController::class, 'uploadKyc'])->name('kyc.upload');

//     // Profile
//     Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile');
// });

// // Admin Routes (Restricted Access)
// Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
//     Route::get('/login', [AdminController::class, 'showAdminLoginForm'])->name('admin.login.form');
//     Route::post('/login', [AdminController::class, 'adminLogin'])->name('admin.login');

// Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard'); // Daftar pengguna & pinjaman aktif (INI YANG NANTI DIPAKAI KEDEPANNYA)
Route::get('/admin-dashboard', [AdminController::class, 'index'])->name('admin.dashboard'); // Daftar pengguna & pinjaman aktif
//     Route::get('/users', [AdminController::class, 'listUsers'])->name('admin.users');
//     Route::get('/loans', [AdminController::class, 'listLoans'])->name('admin.loans');
// });

// // Smart Contract Routes (Sistem mencatat pembayaran, diasumsikan manual)
// Route::post('/smart-contract/create', [LoanController::class, 'createSmartContract'])->name('smartcontract.create')->middleware('auth');
// Route::post('/smart-contract/{id}/record-payment', [LoanController::class, 'recordPayment'])->name('smartcontract.record.payment')->middleware('auth');
