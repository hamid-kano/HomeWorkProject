<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::post('/login', function (\Illuminate\Http\Request $request) {
    // تحقق بسيط للتجربة
    if ($request->email === 'admin@company.sy' && $request->password === 'password') {
        session(['user' => 'admin']);
        return redirect('/dashboard');
    }
    return back()->with('error', 'بيانات تسجيل الدخول غير صحيحة');
});

Route::get('/logout', function () {
    session()->forget('user');
    return redirect('/');
});

// صفحات النظام
Route::get('/dashboard', function () {
    if (!session('user')) return redirect('/login');
    return view('dashboard.index');
});

Route::get('/projects', [App\Http\Controllers\ProjectController::class, 'index']);
Route::post('/projects', [App\Http\Controllers\ProjectController::class, 'store']);
Route::put('/projects/{project}', [App\Http\Controllers\ProjectController::class, 'update']);
Route::delete('/projects/{project}', [App\Http\Controllers\ProjectController::class, 'destroy']);

Route::get('/hr', [App\Http\Controllers\EmployeeController::class, 'index']);
Route::post('/hr', [App\Http\Controllers\EmployeeController::class, 'store']);
Route::put('/hr/{employee}', [App\Http\Controllers\EmployeeController::class, 'update']);
Route::delete('/hr/{employee}', [App\Http\Controllers\EmployeeController::class, 'destroy']);

Route::get('/legal', function () {
    if (!session('user')) return redirect('/login');
    return view('legal.index');
});

Route::get('/technical', function () {
    if (!session('user')) return redirect('/login');
    return view('technical.index');
});

Route::get('/warehouses', function () {
    if (!session('user')) return redirect('/login');
    return view('warehouses.index');
});

Route::get('/sales-points', function () {
    if (!session('user')) return redirect('/login');
    return view('sales-points.index');
});

Route::get('/vehicles', function () {
    if (!session('user')) return redirect('/login');
    return view('vehicles.index');
});


