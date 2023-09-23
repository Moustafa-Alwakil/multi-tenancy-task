<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ListUserController;

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

Route::middleware(['role:' . User::SUPER_ADMIN, 'auth'])->group(function () {
    Route::get('/', DashboardController::class)->name('dashboard');
    Route::get('users/{merchant_id}', ListUserController::class);
    Route::post('logout', [AuthController::class, 'logout']);
});

Route::prefix('login')->controller(AuthController::class)->middleware('guest')->group(function () {
    Route::get('/', 'loginPage')->name('login');
    Route::post('/', 'login');
});
