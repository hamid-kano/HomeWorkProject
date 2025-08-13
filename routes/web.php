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


Route::get('/employees', [App\Http\Controllers\EmployeeController::class, 'index']);
Route::post('/employees', [App\Http\Controllers\EmployeeController::class, 'store']);
Route::put('/employees/{employee}', [App\Http\Controllers\EmployeeController::class, 'update']);
Route::delete('/employees/{employee}', [App\Http\Controllers\EmployeeController::class, 'destroy']);

Route::get('/legal', [App\Http\Controllers\LegalController::class, 'index']);
Route::post('/legal', [App\Http\Controllers\LegalController::class, 'store']);
Route::put('/legal/{case}', [App\Http\Controllers\LegalController::class, 'update']);
Route::delete('/legal/{case}', [App\Http\Controllers\LegalController::class, 'destroy']);

Route::get('/technical', [App\Http\Controllers\TechnicalController::class, 'index']);
Route::post('/technical', [App\Http\Controllers\TechnicalController::class, 'store']);
Route::put('/technical/{equipment}', [App\Http\Controllers\TechnicalController::class, 'update']);
Route::delete('/technical/{equipment}', [App\Http\Controllers\TechnicalController::class, 'destroy']);

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


