<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
});

// أقسام الشركة
Route::get('/projects', function () {
    return view('projects.index');
});

Route::get('/legal', function () {
    return view('legal.index');
});

Route::get('/hr', function () {
    return view('hr.index');
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
