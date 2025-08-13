@extends('layouts.dashboard')

@section('title', 'لوحة التحكم الرئيسية')
@section('page-title', 'لوحة التحكم')

@section('content')
<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-lg p-6 border border-white/20 hover:shadow-xl transition-all duration-300">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-secondary-600 text-sm font-medium">إجمالي المشاريع</p>
                <p class="text-3xl font-bold text-secondary-900 mt-2">{{ \App\Models\Project::count() }}</p>
                <div class="flex items-center mt-2">
                    <i data-lucide="trending-up" class="w-4 h-4 text-success-600 mr-1"></i>
                    <p class="text-success-600 text-sm font-medium">{{ \App\Models\Project::where('status', 'قيد التنفيذ')->count() }} قيد التنفيذ</p>
                </div>
            </div>
            <div class="w-12 h-12 bg-gradient-to-br from-primary-500 to-primary-600 rounded-xl flex items-center justify-center">
                <i data-lucide="clipboard-list" class="w-6 h-6 text-white"></i>
            </div>
        </div>
    </div>

    <div class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-lg p-6 border border-white/20 hover:shadow-xl transition-all duration-300">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-secondary-600 text-sm font-medium">إجمالي الموظفين</p>
                <p class="text-3xl font-bold text-secondary-900 mt-2">{{ \App\Models\Employee::count() }}</p>
                <div class="flex items-center mt-2">
                    <i data-lucide="user-check" class="w-4 h-4 text-success-600 mr-1"></i>
                    <p class="text-success-600 text-sm font-medium">{{ \App\Models\Employee::where('status', 'نشط')->count() }} نشط</p>
                </div>
            </div>
            <div class="w-12 h-12 bg-gradient-to-br from-success-500 to-success-600 rounded-xl flex items-center justify-center">
                <i data-lucide="users" class="w-6 h-6 text-white"></i>
            </div>
        </div>
    </div>

    <div class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-lg p-6 border border-white/20 hover:shadow-xl transition-all duration-300">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-secondary-600 text-sm font-medium">إجمالي الميزانية</p>
                <p class="text-3xl font-bold text-secondary-900 mt-2">{{ number_format(\App\Models\Project::sum('budget')) }} ل.س</p>
                <div class="flex items-center mt-2">
                    <i data-lucide="trending-up" class="w-4 h-4 text-warning-600 mr-1"></i>
                    <p class="text-warning-600 text-sm font-medium">ميزانية المشاريع</p>
                </div>
            </div>
            <div class="w-12 h-12 bg-gradient-to-br from-warning-500 to-warning-600 rounded-xl flex items-center justify-center">
                <i data-lucide="dollar-sign" class="w-6 h-6 text-white"></i>
            </div>
        </div>
    </div>

    <div class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-lg p-6 border border-white/20 hover:shadow-xl transition-all duration-300">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-secondary-600 text-sm font-medium">إجمالي الرواتب</p>
                <p class="text-3xl font-bold text-secondary-900 mt-2">{{ number_format(\App\Models\Employee::where('status', 'نشط')->sum('salary')) }} ل.س</p>
                <div class="flex items-center mt-2">
                    <i data-lucide="banknote" class="w-4 h-4 text-danger-600 mr-1"></i>
                    <p class="text-danger-600 text-sm font-medium">رواتب شهرية</p>
                </div>
            </div>
            <div class="w-12 h-12 bg-gradient-to-br from-danger-500 to-danger-600 rounded-xl flex items-center justify-center">
                <i data-lucide="banknote" class="w-6 h-6 text-white"></i>
            </div>
        </div>
    </div>
</div>

<!-- Charts and Tables Row -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
    <!-- Sales Chart -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <h3 class="text-lg font-semibold text-secondary-800 mb-4">مبيعات الأشهر الأخيرة</h3>
        <div class="h-64 bg-secondary-50 rounded-lg flex items-center justify-center">
            <p class="text-secondary-500">مخطط المبيعات</p>
        </div>
    </div>

    <!-- Recent Projects -->
    <div class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-lg p-6 border border-white/20">
        <h3 class="text-lg font-semibold text-secondary-800 mb-4">المشاريع الأخيرة</h3>
        <div class="space-y-4">
            @foreach(\App\Models\Project::latest()->take(3)->get() as $project)
            <div class="flex items-center justify-between p-3 bg-secondary-50 rounded-lg">
                <div>
                    <p class="font-medium text-secondary-800">{{ $project->name }}</p>
                    <p class="text-sm text-secondary-600">{{ $project->location }}</p>
                </div>
                <div class="text-left">
                    <p class="font-medium text-secondary-800">{{ number_format($project->budget) }} ل.س</p>
                    <span class="inline-block px-2 py-1 text-xs font-medium 
                        @if($project->status == 'مكتمل') bg-success-100 text-success-800
                        @elseif($project->status == 'قيد التنفيذ') bg-primary-100 text-primary-800
                        @elseif($project->status == 'دراسة') bg-warning-100 text-warning-800
                        @else bg-secondary-100 text-secondary-800 @endif rounded-full">
                        {{ $project->status }}
                    </span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-lg p-6 border border-white/20">
    <h3 class="text-lg font-semibold text-secondary-800 mb-6">إجراءات سريعة</h3>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <button class="flex flex-col items-center p-6 bg-primary-50 hover:bg-primary-100 rounded-xl transition-all duration-200 hover:scale-105 group">
            <div class="w-12 h-12 bg-primary-500 rounded-xl flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                <i data-lucide="plus-circle" class="w-6 h-6 text-white"></i>
            </div>
            <span class="text-sm font-medium text-primary-700">مشروع جديد</span>
        </button>
        
        <button class="flex flex-col items-center p-6 bg-success-50 hover:bg-success-100 rounded-xl transition-all duration-200 hover:scale-105 group">
            <div class="w-12 h-12 bg-success-500 rounded-xl flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                <i data-lucide="user-plus" class="w-6 h-6 text-white"></i>
            </div>
            <span class="text-sm font-medium text-success-700">موظف جديد</span>
        </button>
        
        <button class="flex flex-col items-center p-6 bg-warning-50 hover:bg-warning-100 rounded-xl transition-all duration-200 hover:scale-105 group">
            <div class="w-12 h-12 bg-warning-500 rounded-xl flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                <i data-lucide="package-plus" class="w-6 h-6 text-white"></i>
            </div>
            <span class="text-sm font-medium text-warning-700">إضافة مواد</span>
        </button>
        
        <button class="flex flex-col items-center p-6 bg-secondary-50 hover:bg-secondary-100 rounded-xl transition-all duration-200 hover:scale-105 group">
            <div class="w-12 h-12 bg-secondary-500 rounded-xl flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                <i data-lucide="file-text" class="w-6 h-6 text-white"></i>
            </div>
            <span class="text-sm font-medium text-secondary-700">تقرير شامل</span>
        </button>
    </div>
</div>
@endsection