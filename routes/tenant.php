<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Tenant\AuthController;
use App\Http\Controllers\Tenant\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['role:' . User::MERCHANT . '|' . User::USER, 'auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'merchant'])->middleware('only_merchant')->name('dashboard');
    Route::get('/user-dashboard', [DashboardController::class, 'user'])->name('user-dashboard');
    Route::post('logout', [AuthController::class, 'logout']);
});

Route::prefix('login')->controller(AuthController::class)->middleware('guest')->group(function () {
    Route::get('/', 'loginPage')->name('login');
    Route::post('/', 'login');
});
