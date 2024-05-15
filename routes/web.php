<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\PayrollController;

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

Route::get('/', [AuthController::class, 'index'])->middleware('guest');
Route::post('/', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('payroll', [PayrollController::class, 'index'])->name('admin.payroll');
    Route::get('payroll/import', [PayrollController::class, 'payroll_import'])->name('admin.payroll_import');
    Route::post('payroll/import/show', [PayrollController::class, 'payroll_import_show'])->name('admin.payroll_import_show');
    Route::post('payroll/import/process', [PayrollController::class, 'payroll_import_process'])->name('admin.payroll_import_process');
    // Route::get('user', [UserController::class, 'index'])->name('admin.user');

    /*Settings*/
    Route::get('navbars', [SettingsController::class, 'index'])->name('admin.navbars');
    Route::get('navbars/create', [SettingsController::class, 'create'])->name('admin.navbars.create');
    Route::post('navbars/create', [SettingsController::class, 'store'])->name('admin.navbars.store');
    Route::put('navbars/create/{id}', [SettingsController::class, 'update_menu_active'])->name('admin.navbars.update_active');
    /*Settings*/
});