<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\AttendanceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('employees', EmployeeController::class);
Route::resource('departments', DepartmentController::class);
Route::resource('positions', PositionController::class);
Route::resource('salaries', SalaryController::class);
Route::resource('attendance', AttendanceController::class);

Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
Route::get('/employee/{id}', [EmployeeController::class, 'getEmployee']);
Route::get('/salaries/create', [SalaryController::class, 'create'])->name('salaries.create');

Route::post('/salaries', [SalaryController::class, 'store'])->name('salaries.store');
