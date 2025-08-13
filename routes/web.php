<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
});

// أقسام الشركة
Route::get('/projects', [App\Http\Controllers\ProjectController::class, 'index']);
Route::post('/projects', [App\Http\Controllers\ProjectController::class, 'store']);
Route::put('/projects/{project}', [App\Http\Controllers\ProjectController::class, 'update']);
Route::delete('/projects/{project}', [App\Http\Controllers\ProjectController::class, 'destroy']);

Route::get('/hr', [App\Http\Controllers\EmployeeController::class, 'index']);
Route::post('/hr', [App\Http\Controllers\EmployeeController::class, 'store']);
Route::put('/hr/{employee}', [App\Http\Controllers\EmployeeController::class, 'update']);
Route::delete('/hr/{employee}', [App\Http\Controllers\EmployeeController::class, 'destroy']);

// باقي الأقسام - قابلة للتطوير لاحقاً
Route::get('/legal', function () {
    return view('legal.index');
});

Route::get('/technical', function () {
    return view('technical.index');
});

Route::get('/warehouses', function () {
    return view('warehouses.index');
});

Route::get('/sales-points', function () {
    return view('sales-points.index');
});

Route::get('/vehicles', function () {
    return view('vehicles.index');
});
