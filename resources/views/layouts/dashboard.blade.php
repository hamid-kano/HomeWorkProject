<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'لوحة التحكم')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
</head>
<body class="bg-secondary-50">
    <!-- Sidebar -->
    <div class="fixed inset-y-0 right-0 z-50 w-72 bg-gradient-to-b from-secondary-900 to-secondary-800 shadow-2xl transform lg:translate-x-0 -translate-x-full transition-transform duration-300 ease-in-out" id="sidebar">
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
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-secondary-300 hover:bg-secondary-700/50 hover:text-white rounded-xl transition-all duration-200 group">
                    <i data-lucide="layout-dashboard" class="w-5 h-5 flex-shrink-0 group-hover:scale-110 transition-transform"></i>
                    <span class="font-medium">لوحة التحكم</span>
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-secondary-300 hover:bg-secondary-700/50 hover:text-white rounded-xl transition-all duration-200 group">
                    <i data-lucide="users" class="w-5 h-5 flex-shrink-0 group-hover:scale-110 transition-transform"></i>
                    <span class="font-medium">العملاء</span>
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-secondary-300 hover:bg-secondary-700/50 hover:text-white rounded-xl transition-all duration-200 group">
                    <i data-lucide="package" class="w-5 h-5 flex-shrink-0 group-hover:scale-110 transition-transform"></i>
                    <span class="font-medium">المنتجات</span>
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-secondary-300 hover:bg-secondary-700/50 hover:text-white rounded-xl transition-all duration-200 group">
                    <i data-lucide="shopping-cart" class="w-5 h-5 flex-shrink-0 group-hover:scale-110 transition-transform"></i>
                    <span class="font-medium">المبيعات</span>
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-secondary-300 hover:bg-secondary-700/50 hover:text-white rounded-xl transition-all duration-200 group">
                    <i data-lucide="bar-chart-3" class="w-5 h-5 flex-shrink-0 group-hover:scale-110 transition-transform"></i>
                    <span class="font-medium">التقارير</span>
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-secondary-300 hover:bg-secondary-700/50 hover:text-white rounded-xl transition-all duration-200 group">
                    <i data-lucide="settings" class="w-5 h-5 flex-shrink-0 group-hover:scale-110 transition-transform"></i>
                    <span class="font-medium">الإعدادات</span>
                </a>
            </div>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="mr-72">
        <!-- Top Header -->
        <header class="bg-white/80 backdrop-blur-md shadow-sm border-b border-secondary-200/50 sticky top-0 z-40">
            <div class="flex items-center justify-between px-8 py-5">
                <div class="flex items-center space-x-4 space-x-reverse">
                    <button class="lg:hidden p-2 text-secondary-500 hover:text-secondary-700 hover:bg-secondary-100 rounded-xl transition-colors" onclick="toggleSidebar()">
                        <i data-lucide="menu" class="w-5 h-5"></i>
                    </button>
                    <div>
                        <h2 class="text-2xl font-bold text-secondary-900">@yield('page-title', 'لوحة التحكم')</h2>
                        <p class="text-sm text-secondary-500 mt-1">مرحباً بك في لوحة التحكم</p>
                    </div>
                </div>
                
                <div class="flex items-center space-x-4 space-x-reverse">
                    <!-- Search -->
                    <div class="relative hidden md:block">
                        <input type="text" placeholder="بحث..." class="w-64 pl-10 pr-4 py-2 bg-secondary-50 border border-secondary-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                        <i data-lucide="search" class="absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-secondary-400"></i>
                    </div>
                    
                    <!-- Notifications -->
                    <button class="relative p-3 text-secondary-500 hover:text-secondary-700 hover:bg-secondary-100 rounded-xl transition-colors">
                        <i data-lucide="bell" class="w-5 h-5"></i>
                        <span class="absolute top-2 right-2 w-2 h-2 bg-danger-500 rounded-full animate-pulse"></span>
                    </button>
                    
                    <!-- User Menu -->
                    <div class="relative">
                        <button class="flex items-center space-x-3 space-x-reverse p-2 text-secondary-700 hover:bg-secondary-100 rounded-xl transition-colors">
                            <div class="w-10 h-10 bg-gradient-to-br from-primary-500 to-primary-600 rounded-xl flex items-center justify-center shadow-lg">
                                <span class="text-white text-sm font-bold">أ</span>
                            </div>
                            <div class="text-right hidden sm:block">
                                <p class="font-semibold text-secondary-900">أحمد محمد</p>
                                <p class="text-xs text-secondary-500">مدير عام</p>
                            </div>
                            <i data-lucide="chevron-down" class="w-4 h-4 text-secondary-400"></i>
                        </button>
                    </div>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <main class="p-8 min-h-screen bg-gradient-to-br from-secondary-50 to-secondary-100">
            @yield('content')
        </main>
    </div>

    <!-- Mobile Sidebar Overlay -->
    <div class="fixed inset-0 z-40 bg-black bg-opacity-50 lg:hidden hidden" id="sidebar-overlay" onclick="toggleSidebar()"></div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }
        
        // Initialize Lucide icons
        document.addEventListener('DOMContentLoaded', function() {
            lucide.createIcons();
        });
    </script>
</body>
</html>