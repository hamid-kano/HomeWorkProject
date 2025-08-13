<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'نظام إدارة الأعمال')</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            200: '#bfdbfe',
                            300: '#93c5fd',
                            400: '#60a5fa',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a',
                        },
                        secondary: {
                            50: '#f8fafc',
                            100: '#f1f5f9',
                            200: '#e2e8f0',
                            300: '#cbd5e1',
                            400: '#94a3b8',
                            500: '#64748b',
                            600: '#475569',
                            700: '#334155',
                            800: '#1e293b',
                            900: '#0f172a',
                        },
                        success: {
                            50: '#f0fdf4',
                            100: '#dcfce7',
                            200: '#bbf7d0',
                            300: '#86efac',
                            400: '#4ade80',
                            500: '#22c55e',
                            600: '#16a34a',
                            700: '#15803d',
                            800: '#166534',
                            900: '#14532d',
                        },
                        warning: {
                            50: '#fffbeb',
                            100: '#fef3c7',
                            200: '#fde68a',
                            300: '#fcd34d',
                            400: '#fbbf24',
                            500: '#f59e0b',
                            600: '#d97706',
                            700: '#b45309',
                            800: '#92400e',
                            900: '#78350f',
                        },
                        danger: {
                            50: '#fef2f2',
                            100: '#fee2e2',
                            200: '#fecaca',
                            300: '#fca5a5',
                            400: '#f87171',
                            500: '#ef4444',
                            600: '#dc2626',
                            700: '#b91c1c',
                            800: '#991b1b',
                            900: '#7f1d1d',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-secondary-50">
    <!-- Sidebar -->
    <div class="fixed inset-y-0 right-0 z-50 w-72 bg-gradient-to-b from-secondary-900 to-secondary-800 shadow-2xl transform translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out" id="sidebar">
        <!-- Logo -->
        <div class="flex items-center justify-center h-20 border-b border-secondary-700">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-primary-500 rounded-xl flex items-center justify-center">
                    <i data-lucide="briefcase" class="w-6 h-6 text-white"></i>
                </div>
                <h1 class="text-xl font-bold text-white">إدارة الأعمال</h1>
            </div>
        </div>
        
        <!-- Navigation -->
        <nav class="mt-8 px-4">
            <div class="space-y-2">
                <a href="/dashboard" class="flex items-center gap-3 px-4 py-3 text-secondary-300 hover:bg-secondary-700/50 hover:text-white rounded-xl transition-all duration-200 group">
                    <i data-lucide="layout-dashboard" class="w-5 h-5 flex-shrink-0 group-hover:scale-110 transition-transform"></i>
                    <span class="font-medium">لوحة التحكم</span>
                </a>
                <a href="/projects" class="flex items-center gap-3 px-4 py-3 text-secondary-300 hover:bg-secondary-700/50 hover:text-white rounded-xl transition-all duration-200 group">
                    <i data-lucide="clipboard-list" class="w-5 h-5 flex-shrink-0 group-hover:scale-110 transition-transform"></i>
                    <span class="font-medium">دراسة المشاريع</span>
                </a>
                <a href="/legal" class="flex items-center gap-3 px-4 py-3 text-secondary-300 hover:bg-secondary-700/50 hover:text-white rounded-xl transition-all duration-200 group">
                    <i data-lucide="scale" class="w-5 h-5 flex-shrink-0 group-hover:scale-110 transition-transform"></i>
                    <span class="font-medium">القسم القانوني</span>
                </a>
                <a href="/employees" class="flex items-center gap-3 px-4 py-3 text-secondary-300 hover:bg-secondary-700/50 hover:text-white rounded-xl transition-all duration-200 group">
                    <i data-lucide="users" class="w-5 h-5 flex-shrink-0 group-hover:scale-110 transition-transform"></i>
                    <span class="font-medium">الموارد البشرية</span>
                </a>
                <a href="/technical" class="flex items-center gap-3 px-4 py-3 text-secondary-300 hover:bg-secondary-700/50 hover:text-white rounded-xl transition-all duration-200 group">
                    <i data-lucide="wrench" class="w-5 h-5 flex-shrink-0 group-hover:scale-110 transition-transform"></i>
                    <span class="font-medium">القسم التقني</span>
                </a>
                <a href="/warehouses" class="flex items-center gap-3 px-4 py-3 text-secondary-300 hover:bg-secondary-700/50 hover:text-white rounded-xl transition-all duration-200 group">
                    <i data-lucide="warehouse" class="w-5 h-5 flex-shrink-0 group-hover:scale-110 transition-transform"></i>
                    <span class="font-medium">المستودعات</span>
                </a>
                <a href="/sales-points" class="flex items-center gap-3 px-4 py-3 text-secondary-300 hover:bg-secondary-700/50 hover:text-white rounded-xl transition-all duration-200 group">
                    <i data-lucide="store" class="w-5 h-5 flex-shrink-0 group-hover:scale-110 transition-transform"></i>
                    <span class="font-medium">نقاط البيع</span>
                </a>
                <a href="/vehicles" class="flex items-center gap-3 px-4 py-3 text-secondary-300 hover:bg-secondary-700/50 hover:text-white rounded-xl transition-all duration-200 group">
                    <i data-lucide="truck" class="w-5 h-5 flex-shrink-0 group-hover:scale-110 transition-transform"></i>
                    <span class="font-medium">متابعة الآليات</span>
                </a>
            </div>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="lg:mr-72 transition-all duration-300">
        <!-- Top Header -->
        <header class="bg-white/80 backdrop-blur-md shadow-sm border-b border-secondary-200/50 sticky top-0 z-40">
            <div class="flex items-center justify-between px-4 lg:px-8 py-4 lg:py-5">
                <div class="flex items-center gap-4">
                    <button class="lg:hidden p-2 text-secondary-500 hover:text-secondary-700 hover:bg-secondary-100 rounded-xl transition-colors" onclick="toggleSidebar()">
                        <i data-lucide="menu" class="w-5 h-5"></i>
                    </button>
                    <div>
                        <h2 class="text-xl lg:text-2xl font-bold text-secondary-900">@yield('page-title', 'لوحة التحكم')</h2>
                        <p class="text-sm text-secondary-500 mt-1 hidden sm:block">مرحباً بك في لوحة التحكم</p>
                    </div>
                </div>
                
                <div class="flex items-center gap-2 lg:gap-4">
                    <!-- Search -->
                    <div class="relative hidden md:block">
                        <input type="text" placeholder="بحث..." class="w-48 lg:w-64 pl-10 pr-4 py-2 bg-secondary-50 border border-secondary-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                        <i data-lucide="search" class="absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-secondary-400"></i>
                    </div>
                    
                    <!-- Notifications -->
                    <button class="relative p-2 lg:p-3 text-secondary-500 hover:text-secondary-700 hover:bg-secondary-100 rounded-xl transition-colors">
                        <i data-lucide="bell" class="w-5 h-5"></i>
                        <span class="absolute top-1 lg:top-2 right-1 lg:right-2 w-2 h-2 bg-danger-500 rounded-full animate-pulse"></span>
                    </button>
                    
                    <!-- User Menu -->
                    <div class="flex items-center gap-2">
                        <div class="flex items-center gap-2 lg:gap-3 p-2 text-secondary-700">
                            <div class="w-8 h-8 lg:w-10 lg:h-10 bg-gradient-to-br from-primary-500 to-primary-600 rounded-xl flex items-center justify-center shadow-lg">
                                <span class="text-white text-sm font-bold">أ</span>
                            </div>
                            <div class="text-right hidden lg:block">
                                <p class="font-semibold text-secondary-900">أحمد محمد</p>
                                <p class="text-xs text-secondary-500">مدير عام</p>
                            </div>
                        </div>
                        <a href="/logout" class="p-2 text-secondary-500 hover:text-danger-600 hover:bg-danger-50 rounded-xl transition-colors" title="تسجيل الخروج">
                            <i data-lucide="log-out" class="w-5 h-5"></i>
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <main class="p-4 lg:p-8 min-h-screen bg-gradient-to-br from-secondary-50 to-secondary-100">
            @include('components.alert')
            @yield('content')
        </main>
    </div>

    <!-- Mobile Sidebar Overlay -->
    <div class="fixed inset-0 z-40 bg-black/50 backdrop-blur-sm lg:hidden hidden" id="sidebar-overlay" onclick="closeSidebar()"></div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            
            if (window.innerWidth < 1024) {
                if (sidebar.classList.contains('translate-x-full')) {
                    sidebar.classList.remove('translate-x-full');
                    overlay.classList.remove('hidden');
                } else {
                    sidebar.classList.add('translate-x-full');
                    overlay.classList.add('hidden');
                }
            }
        }
        
        function closeSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            
            if (window.innerWidth < 1024) {
                sidebar.classList.add('translate-x-full');
                overlay.classList.add('hidden');
            }
        }
        
        document.addEventListener('DOMContentLoaded', function() {
            lucide.createIcons();
        });
    </script>
</body>
</html>