<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// Controller kamu
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\SettingsController;

Route::get('/', function () {
    return view('auth.login');
});

// Semua fitur CRUD hanya bisa diakses setelah login
Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // RESOURCE ROUTES (yang dulu hilang)
    Route::resource('employees', EmployeeController::class);
    Route::resource('departments', DepartmentController::class);
    Route::resource('positions', PositionController::class);
    Route::resource('salaries', SalaryController::class);
    Route::resource('attendance', AttendanceController::class);
    Route::resource('reports', ReportController::class);
    Route::resource('pengajuans', PengajuanController::class);

    // Extra Routes
    Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
    Route::get('/employee/{id}', [EmployeeController::class, 'getEmployee']);
    Route::get('/salaries/create', [SalaryController::class, 'create'])->name('salaries.create');

    Route::post('/salaries', [SalaryController::class, 'store'])->name('salaries.store');
    Route::post('/reports', [ReportController::class, 'store'])->name('reports.store');

    // Settings
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::post('/settings/theme', [SettingsController::class, 'updateTheme'])->name('settings.updateTheme');
    Route::post('/settings/language', [SettingsController::class, 'updateLanguage'])->name('settings.updateLanguage');

    // Breeze Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// LOGIN / REGISTER ROUTES BREEZE
require __DIR__ . '/auth.php';
