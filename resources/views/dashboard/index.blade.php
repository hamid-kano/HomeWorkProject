@extends('layouts.dashboard')

@section('title', 'لوحة التحكم الرئيسية')
@section('page-title', 'لوحة التحكم')

@section('content')
<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-lg p-6 border border-white/20 hover:shadow-xl transition-all duration-300">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-secondary-600 text-sm font-medium">إجمالي الإيرادات</p>
                <p class="text-3xl font-bold text-secondary-900 mt-2">2,450,000 ر.س</p>
                <div class="flex items-center mt-2">
                    <i data-lucide="trending-up" class="w-4 h-4 text-success-600 mr-1"></i>
                    <p class="text-success-600 text-sm font-medium">+15% من الشهر الماضي</p>
                </div>
            </div>
            <div class="w-12 h-12 bg-gradient-to-br from-primary-500 to-primary-600 rounded-xl flex items-center justify-center">
                <i data-lucide="dollar-sign" class="w-6 h-6 text-white"></i>
            </div>
        </div>
    </div>

    <div class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-lg p-6 border border-white/20 hover:shadow-xl transition-all duration-300">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-secondary-600 text-sm font-medium">المشاريع النشطة</p>
                <p class="text-3xl font-bold text-secondary-900 mt-2">12</p>
                <div class="flex items-center mt-2">
                    <i data-lucide="activity" class="w-4 h-4 text-success-600 mr-1"></i>
                    <p class="text-success-600 text-sm font-medium">3 مشاريع جديدة</p>
                </div>
            </div>
            <div class="w-12 h-12 bg-gradient-to-br from-success-500 to-success-600 rounded-xl flex items-center justify-center">
                <i data-lucide="clipboard-list" class="w-6 h-6 text-white"></i>
            </div>
        </div>
    </div>

    <div class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-lg p-6 border border-white/20 hover:shadow-xl transition-all duration-300">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-secondary-600 text-sm font-medium">عدد الموظفين</p>
                <p class="text-3xl font-bold text-secondary-900 mt-2">156</p>
                <div class="flex items-center mt-2">
                    <i data-lucide="user-plus" class="w-4 h-4 text-warning-600 mr-1"></i>
                    <p class="text-warning-600 text-sm font-medium">8 موظفين جدد</p>
                </div>
            </div>
            <div class="w-12 h-12 bg-gradient-to-br from-warning-500 to-warning-600 rounded-xl flex items-center justify-center">
                <i data-lucide="users" class="w-6 h-6 text-white"></i>
            </div>
        </div>
    </div>

    <div class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-lg p-6 border border-white/20 hover:shadow-xl transition-all duration-300">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-secondary-600 text-sm font-medium">عدد الآليات</p>
                <p class="text-3xl font-bold text-secondary-900 mt-2">23</p>
                <div class="flex items-center mt-2">
                    <i data-lucide="wrench" class="w-4 h-4 text-danger-600 mr-1"></i>
                    <p class="text-danger-600 text-sm font-medium">5 تحتاج صيانة</p>
                </div>
            </div>
            <div class="w-12 h-12 bg-gradient-to-br from-danger-500 to-danger-600 rounded-xl flex items-center justify-center">
                <i data-lucide="truck" class="w-6 h-6 text-white"></i>
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

    <!-- Recent Orders -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <h3 class="text-lg font-semibold text-secondary-800 mb-4">الطلبات الأخيرة</h3>
        <div class="space-y-4">
            <div class="flex items-center justify-between p-3 bg-secondary-50 rounded-lg">
                <div>
                    <p class="font-medium text-secondary-800">طلب #1234</p>
                    <p class="text-sm text-secondary-600">أحمد محمد</p>
                </div>
                <div class="text-left">
                    <p class="font-medium text-secondary-800">1,250 ر.س</p>
                    <span class="inline-block px-2 py-1 text-xs font-medium bg-success-100 text-success-800 rounded-full">مكتمل</span>
                </div>
            </div>
            
            <div class="flex items-center justify-between p-3 bg-secondary-50 rounded-lg">
                <div>
                    <p class="font-medium text-secondary-800">طلب #1235</p>
                    <p class="text-sm text-secondary-600">فاطمة أحمد</p>
                </div>
                <div class="text-left">
                    <p class="font-medium text-secondary-800">890 ر.س</p>
                    <span class="inline-block px-2 py-1 text-xs font-medium bg-warning-100 text-warning-800 rounded-full">قيد المعالجة</span>
                </div>
            </div>
            
            <div class="flex items-center justify-between p-3 bg-secondary-50 rounded-lg">
                <div>
                    <p class="font-medium text-secondary-800">طلب #1236</p>
                    <p class="text-sm text-secondary-600">محمد علي</p>
                </div>
                <div class="text-left">
                    <p class="font-medium text-secondary-800">2,100 ر.س</p>
                    <span class="inline-block px-2 py-1 text-xs font-medium bg-primary-100 text-primary-800 rounded-full">جديد</span>
                </div>
            </div>
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