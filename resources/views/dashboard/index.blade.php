@extends('layouts.dashboard')

@section('title', 'لوحة التحكم الرئيسية')
@section('page-title', 'لوحة التحكم')

@section('content')
<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-lg p-6 border border-white/20 hover:shadow-xl transition-all duration-300">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-secondary-600 text-sm font-medium">إجمالي المبيعات</p>
                <p class="text-3xl font-bold text-secondary-900 mt-2">245,000 ر.س</p>
                <div class="flex items-center mt-2">
                    <i data-lucide="trending-up" class="w-4 h-4 text-success-600 mr-1"></i>
                    <p class="text-success-600 text-sm font-medium">+12% من الشهر الماضي</p>
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
                <p class="text-secondary-600 text-sm font-medium">العملاء الجدد</p>
                <p class="text-3xl font-bold text-secondary-900 mt-2">1,234</p>
                <div class="flex items-center mt-2">
                    <i data-lucide="trending-up" class="w-4 h-4 text-success-600 mr-1"></i>
                    <p class="text-success-600 text-sm font-medium">+8% من الشهر الماضي</p>
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
                <p class="text-secondary-600 text-sm font-medium">الطلبات المعلقة</p>
                <p class="text-3xl font-bold text-secondary-900 mt-2">56</p>
                <div class="flex items-center mt-2">
                    <i data-lucide="clock" class="w-4 h-4 text-warning-600 mr-1"></i>
                    <p class="text-warning-600 text-sm font-medium">تحتاج مراجعة</p>
                </div>
            </div>
            <div class="w-12 h-12 bg-gradient-to-br from-warning-500 to-warning-600 rounded-xl flex items-center justify-center">
                <i data-lucide="package" class="w-6 h-6 text-white"></i>
            </div>
        </div>
    </div>

    <div class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-lg p-6 border border-white/20 hover:shadow-xl transition-all duration-300">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-secondary-600 text-sm font-medium">المخزون المنخفض</p>
                <p class="text-3xl font-bold text-secondary-900 mt-2">23</p>
                <div class="flex items-center mt-2">
                    <i data-lucide="alert-triangle" class="w-4 h-4 text-danger-600 mr-1"></i>
                    <p class="text-danger-600 text-sm font-medium">منتج تحت الحد الأدنى</p>
                </div>
            </div>
            <div class="w-12 h-12 bg-gradient-to-br from-danger-500 to-danger-600 rounded-xl flex items-center justify-center">
                <i data-lucide="alert-triangle" class="w-6 h-6 text-white"></i>
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
<div class="bg-white rounded-lg shadow-sm p-6">
    <h3 class="text-lg font-semibold text-secondary-800 mb-4">إجراءات سريعة</h3>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <button class="flex flex-col items-center p-4 bg-primary-50 hover:bg-primary-100 rounded-lg transition-colors">
            <span class="text-2xl mb-2">➕</span>
            <span class="text-sm font-medium text-primary-700">إضافة منتج</span>
        </button>
        
        <button class="flex flex-col items-center p-4 bg-success-50 hover:bg-success-100 rounded-lg transition-colors">
            <span class="text-2xl mb-2">👤</span>
            <span class="text-sm font-medium text-success-700">عميل جديد</span>
        </button>
        
        <button class="flex flex-col items-center p-4 bg-warning-50 hover:bg-warning-100 rounded-lg transition-colors">
            <span class="text-2xl mb-2">📊</span>
            <span class="text-sm font-medium text-warning-700">تقرير مبيعات</span>
        </button>
        
        <button class="flex flex-col items-center p-4 bg-secondary-50 hover:bg-secondary-100 rounded-lg transition-colors">
            <span class="text-2xl mb-2">⚙️</span>
            <span class="text-sm font-medium text-secondary-700">الإعدادات</span>
        </button>
    </div>
</div>
@endsection