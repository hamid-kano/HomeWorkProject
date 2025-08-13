@extends('layouts.app')

@section('title', 'تسجيل الدخول - إدارة الأعمال')

@section('styles')
<script src="https://cdn.tailwindcss.com"></script>
@endsection

@section('content')
<div class="bg-gradient-to-br from-primary-50 to-secondary-100 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <!-- Logo -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center gap-3 mb-4">
                <div class="w-12 h-12 bg-primary-500 rounded-xl flex items-center justify-center">
                    <i data-lucide="briefcase" class="w-7 h-7 text-white"></i>
                </div>
                <h1 class="text-3xl font-bold text-secondary-900">إدارة الأعمال</h1>
            </div>
            <p class="text-secondary-600">مرحباً بك مرة أخرى</p>
        </div>

        <!-- Login Form -->
        <div class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-xl p-8 border border-white/20">
            <h2 class="text-2xl font-bold text-secondary-900 mb-6 text-center">تسجيل الدخول</h2>
            
            <form method="POST" action="/login" class="space-y-6">
                @csrf
                
                <div>
                    <label class="block text-sm font-medium text-secondary-700 mb-2">البريد الإلكتروني</label>
                    <div class="relative">
                        <input type="email" name="email" value="{{ old('email') }}" required 
                               class="w-full pl-12 pr-4 py-3 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-colors"
                               placeholder="أدخل بريدك الإلكتروني">
                        <i data-lucide="mail" class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-secondary-400"></i>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-secondary-700 mb-2">كلمة المرور</label>
                    <div class="relative">
                        <input type="password" name="password" required 
                               class="w-full pl-12 pr-4 py-3 border border-secondary-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-colors"
                               placeholder="أدخل كلمة المرور">
                        <i data-lucide="lock" class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-secondary-400"></i>
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember" class="rounded border-secondary-300 text-primary-600 focus:ring-primary-500">
                        <span class="mr-2 text-sm text-secondary-600">تذكرني</span>
                    </label>
                </div>

                <button type="submit" class="w-full bg-primary-500 hover:bg-primary-600 text-white py-3 rounded-lg font-semibold transition-all hover:scale-105 flex items-center justify-center gap-2">
                    <i data-lucide="log-in" class="w-5 h-5"></i>
                    تسجيل الدخول
                </button>
            </form>

            <!-- Demo Credentials -->
            <div class="mt-6 p-4 bg-secondary-50 rounded-lg">
                <p class="text-sm text-secondary-600 mb-2 font-medium">بيانات تجريبية:</p>
                <div class="text-xs text-secondary-500 space-y-1">
                    <p>البريد: admin@company.sy</p>
                    <p>كلمة المرور: password</p>
                </div>
            </div>
        </div>

        <!-- Back to Home -->
        <div class="text-center mt-6">
            <a href="/" class="text-secondary-600 hover:text-secondary-800 text-sm flex items-center justify-center gap-2">
                <i data-lucide="arrow-right" class="w-4 h-4"></i>
                العودة للصفحة الرئيسية
            </a>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        lucide.createIcons();
    });
</script>
@endsection