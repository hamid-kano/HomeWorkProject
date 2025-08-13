<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'نظام إدارة الأعمال')</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <script src="https://cdn.tailwindcss.com"></script>
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
<body class="bg-gradient-to-br from-secondary-50 to-primary-50 min-h-screen">
    <!-- Navigation -->
    <nav class="bg-white/80 backdrop-blur-sm shadow-lg border-b border-white/20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-primary-500 rounded-xl flex items-center justify-center">
                        <i data-lucide="briefcase" class="w-6 h-6 text-white"></i>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-secondary-900">@yield('page-title', 'نظام إدارة الأعمال')</h1>
                        <p class="text-xs text-secondary-500">إدارة شاملة لأعمالك</p>
                    </div>
                </div>
                
                <div class="flex items-center gap-4">
                    <a href="/projects" class="text-secondary-600 hover:text-primary-600 px-3 py-2 rounded-lg hover:bg-primary-50 transition-colors">المشاريع</a>
                    <a href="/employees" class="text-secondary-600 hover:text-primary-600 px-3 py-2 rounded-lg hover:bg-primary-50 transition-colors">الموظفين</a>
                    <a href="/legal" class="text-secondary-600 hover:text-primary-600 px-3 py-2 rounded-lg hover:bg-primary-50 transition-colors">القانوني</a>
                    <a href="/" class="bg-primary-500 hover:bg-primary-600 text-white px-4 py-2 rounded-lg transition-colors">الرئيسية</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @if(session('success'))
            <x-alert type="success" :message="session('success')" />
        @endif
        
        @if(session('error'))
            <x-alert type="error" :message="session('error')" />
        @endif

        @yield('content')
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            lucide.createIcons();
        });
    </script>
</body>
</html>