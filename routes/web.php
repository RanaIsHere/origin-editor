<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
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

// Login

Route::get('/', function () { return view('login'); });
Route::post('/', [LoginController::class, 'login' ]);

// Dashboard

Route::get('/dashboard/vehicles', [DashboardController::class, 'defaultIndex']);
Route::get('/dashboard/customers', [DashboardController::class, 'defaultCustomers']);
Route::get('/dashboard/transactions', [DashboardController::class, 'defaultTransactions']);
Route::get('/dashboard/reports', [DashboardController::class, 'defaultReports']);

Route::post('/dashboard/vehicles/create', [DashboardController::class, 'addVehicles']);
Route::post('/dashboard/customers/create', [DashboardController::class, 'addClients']);
Route::post('/dashboard/transactions/insertCash', [DashboardController::class, 'insertTransactionByCash']);
Route::post('/dashboard/transactions/insertCredit', [DashboardController::class, 'insertTransactionByCredit']);
Route::post('/dashboard/transactions/createPackages', [DashboardController::class, 'createPackages']);