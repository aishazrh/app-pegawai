<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('employees', EmployeeController::class);
Route::resource('departments', DepartmentController::class);
Route::resource('positions', PositionController::class);
Route::resource('salaries', SalaryController::class);
Route::resource('attendance', AttendanceController::class);
Route::resource('reports', ReportController::class);
Route::resource('pengajuans', PengajuanController::class);
// Route::resource('settings', SettingsController::class);

Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
Route::get('/employee/{id}', [EmployeeController::class, 'getEmployee']);
Route::get('/salaries/create', [SalaryController::class, 'create'])->name('salaries.create');

Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
Route::post('/settings/theme', [SettingsController::class, 'updateTheme'])->name('settings.updateTheme');
Route::post('/settings/language', [SettingsController::class, 'updateLanguage'])->name('settings.updateLanguage');

Route::post('/salaries', [SalaryController::class, 'store'])->name('salaries.store');
Route::post('/reports', [ReportController::class, 'store'])->name('reports.store');