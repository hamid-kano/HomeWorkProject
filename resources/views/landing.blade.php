<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>إدارة الأعمال - نظام إدارة شامل</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
    <style>
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        @keyframes fade-in-up {
            0% { opacity: 0; transform: translateY(30px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        .animate-blob { animation: blob 7s infinite; }
        .animate-float { animation: float 6s ease-in-out infinite; }
        .animate-fade-in-up { animation: fade-in-up 1s ease-out; }
        .animation-delay-1000 { animation-delay: 1s; }
        .animation-delay-2000 { animation-delay: 2s; }
        .animation-delay-4000 { animation-delay: 4s; }
        
        .navbar-scrolled {
            background: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(20px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        
        #mobileMenu.show {
            transform: translateY(0);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-secondary-50 to-primary-50 min-h-screen">
    <!-- Header -->
    <header class="fixed w-full top-0 z-50 transition-all duration-300" id="navbar">
        <div class="bg-white/90 backdrop-blur-xl border-b border-white/20 shadow-lg">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center py-4">
                    <!-- Logo -->
                    <div class="flex items-center gap-3 group cursor-pointer">
                        <div class="w-12 h-12 bg-gradient-to-br from-primary-500 to-primary-600 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                            <i data-lucide="briefcase" class="w-7 h-7 text-white"></i>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold bg-gradient-to-r from-secondary-900 to-primary-600 bg-clip-text text-transparent">إدارة الأعمال</h1>
                            <p class="text-xs text-secondary-500 font-medium">نظام إدارة متكامل</p>
                        </div>
                    </div>
                    
                    <!-- Navigation Menu -->
                    <nav class="hidden lg:flex items-center gap-8">
                        <a href="#features" class="text-secondary-700 hover:text-primary-600 font-medium transition-colors relative group">
                            الميزات
                            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-primary-600 transition-all group-hover:w-full"></span>
                        </a>
                        <a href="#demo" class="text-secondary-700 hover:text-primary-600 font-medium transition-colors relative group">
                            عرض توضيحي
                            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-primary-600 transition-all group-hover:w-full"></span>
                        </a>
                        <a href="#contact" class="text-secondary-700 hover:text-primary-600 font-medium transition-colors relative group">
                            اتصل بنا
                            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-primary-600 transition-all group-hover:w-full"></span>
                        </a>
                    </nav>
                    
                    <!-- CTA Buttons -->
                    <div class="flex items-center gap-4">
                        <a href="/login" class="group bg-gradient-to-r from-primary-500 to-primary-600 hover:from-primary-600 hover:to-primary-700 text-white px-6 py-3 rounded-2xl font-semibold transition-all hover:scale-105 hover:shadow-xl flex items-center gap-2">
                            <i data-lucide="log-in" class="w-4 h-4 group-hover:animate-pulse"></i>
                            <span class="hidden sm:inline">تسجيل الدخول</span>
                            <span class="sm:hidden">دخول</span>
                        </a>
                        
                        <!-- Mobile Menu Button -->
                        <button class="lg:hidden p-2 text-secondary-700 hover:text-primary-600 hover:bg-primary-50 rounded-xl transition-colors" onclick="toggleMobileMenu()">
                            <i data-lucide="menu" class="w-6 h-6"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Mobile Menu -->
        <div id="mobileMenu" class="lg:hidden bg-white/95 backdrop-blur-xl border-b border-white/20 shadow-xl transform -translate-y-full transition-transform duration-300">
            <div class="max-w-7xl mx-auto px-4 py-6">
                <nav class="flex flex-col gap-4">
                    <a href="#features" class="flex items-center gap-3 text-secondary-700 hover:text-primary-600 font-medium py-3 px-4 rounded-xl hover:bg-primary-50 transition-colors" onclick="toggleMobileMenu()">
                        <i data-lucide="star" class="w-5 h-5"></i>
                        الميزات
                    </a>
                    <a href="#demo" class="flex items-center gap-3 text-secondary-700 hover:text-primary-600 font-medium py-3 px-4 rounded-xl hover:bg-primary-50 transition-colors" onclick="toggleMobileMenu()">
                        <i data-lucide="play-circle" class="w-5 h-5"></i>
                        عرض توضيحي
                    </a>
                    <a href="#contact" class="flex items-center gap-3 text-secondary-700 hover:text-primary-600 font-medium py-3 px-4 rounded-xl hover:bg-primary-50 transition-colors" onclick="toggleMobileMenu()">
                        <i data-lucide="mail" class="w-5 h-5"></i>
                        اتصل بنا
                    </a>
                    <div class="border-t border-secondary-200 pt-4 mt-4">
                        <div class="flex items-center gap-2 text-secondary-600 mb-4">
                            <i data-lucide="phone" class="w-4 h-4"></i>
                            <span class="text-sm">+963 11 123 4567</span>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="relative pt-40 pb-32 overflow-hidden">
        <!-- Animated Background -->
        <div class="absolute inset-0 bg-gradient-to-br from-primary-50 via-white to-secondary-50">
            <div class="absolute top-20 left-20 w-72 h-72 bg-primary-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
            <div class="absolute top-40 right-20 w-72 h-72 bg-secondary-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
            <div class="absolute -bottom-8 left-40 w-72 h-72 bg-success-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"></div>
        </div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <!-- Floating Icons -->
                <div class="absolute top-10 left-10 animate-float">
                    <div class="w-16 h-16 bg-primary-100 rounded-2xl flex items-center justify-center shadow-lg">
                        <i data-lucide="trending-up" class="w-8 h-8 text-primary-600"></i>
                    </div>
                </div>
                <div class="absolute top-20 right-10 animate-float animation-delay-1000">
                    <div class="w-16 h-16 bg-success-100 rounded-2xl flex items-center justify-center shadow-lg">
                        <i data-lucide="target" class="w-8 h-8 text-success-600"></i>
                    </div>
                </div>
                <div class="absolute bottom-20 left-20 animate-float animation-delay-2000">
                    <div class="w-16 h-16 bg-warning-100 rounded-2xl flex items-center justify-center shadow-lg">
                        <i data-lucide="zap" class="w-8 h-8 text-warning-600"></i>
                    </div>
                </div>
                
                <div class="animate-fade-in-up">
                    <div class="inline-flex items-center gap-2 bg-primary-100 text-primary-700 px-4 py-2 rounded-full text-sm font-medium mb-6">
                        <i data-lucide="sparkles" class="w-4 h-4"></i>
                        الحل الأمثل لإدارة أعمالك
                    </div>
                    
                    <h1 class="text-6xl md:text-7xl font-bold text-secondary-900 mb-6 leading-tight">
                        <span class="block">قوة الإدارة</span>
                        <span class="bg-gradient-to-r from-primary-600 to-secondary-600 bg-clip-text text-transparent">الذكية</span>
                    </h1>
                    
                    <p class="text-xl md:text-2xl text-secondary-600 mb-12 max-w-4xl mx-auto leading-relaxed">
                        حوّل أعمالك إلى <span class="font-semibold text-primary-600">إمبراطورية رقمية</span> مع نظام إدارة متكامل يجمع بين القوة والبساطة
                    </p>
                    
                    <div class="flex flex-col sm:flex-row justify-center gap-6 mb-16">
                        <a href="/login" class="group bg-gradient-to-r from-primary-500 to-primary-600 hover:from-primary-600 hover:to-primary-700 text-white px-10 py-5 rounded-2xl font-bold text-lg transition-all hover:scale-105 hover:shadow-2xl flex items-center justify-center gap-3">
                            <i data-lucide="rocket" class="w-6 h-6 group-hover:animate-bounce"></i>
                            ابدأ رحلتك الآن
                            <i data-lucide="arrow-left" class="w-5 h-5 group-hover:translate-x-1 transition-transform"></i>
                        </a>
                        <a href="#demo" class="group border-2 border-primary-500 text-primary-600 hover:bg-primary-50 px-10 py-5 rounded-2xl font-bold text-lg transition-all hover:scale-105 flex items-center justify-center gap-3">
                            <i data-lucide="play-circle" class="w-6 h-6 group-hover:animate-pulse"></i>
                            شاهد العرض التوضيحي
                        </a>
                    </div>
                    
                    <!-- Trust Indicators -->
                    <div class="flex flex-wrap justify-center items-center gap-8 text-secondary-500">
                        <div class="flex items-center gap-2">
                            <i data-lucide="shield-check" class="w-5 h-5 text-success-500"></i>
                            <span class="text-sm font-medium">100% آمن</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i data-lucide="clock" class="w-5 h-5 text-primary-500"></i>
                            <span class="text-sm font-medium">دعم 24/7</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i data-lucide="users" class="w-5 h-5 text-warning-500"></i>
                            <span class="text-sm font-medium">+1000 عميل راضٍ</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Business Value Section -->
    <section class="py-20 bg-white/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-secondary-900 mb-4">لماذا تختار نظامنا؟</h2>
                <p class="text-xl text-secondary-600">ميزات تنافسية تجعلنا الخيار الأول</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="group text-center p-8 rounded-3xl bg-gradient-to-br from-primary-50 to-primary-100 hover:from-primary-100 hover:to-primary-200 transition-all hover:scale-105 hover:shadow-xl">
                    <div class="w-20 h-20 bg-primary-500 rounded-3xl flex items-center justify-center mx-auto mb-6 group-hover:animate-bounce">
                        <i data-lucide="brain" class="w-10 h-10 text-white"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-secondary-900 mb-4">ذكاء اصطناعي</h3>
                    <p class="text-secondary-600">تحليلات ذكية وتوقعات دقيقة لاتخاذ قرارات أفضل</p>
                </div>
                
                <div class="group text-center p-8 rounded-3xl bg-gradient-to-br from-success-50 to-success-100 hover:from-success-100 hover:to-success-200 transition-all hover:scale-105 hover:shadow-xl">
                    <div class="w-20 h-20 bg-success-500 rounded-3xl flex items-center justify-center mx-auto mb-6 group-hover:animate-bounce">
                        <i data-lucide="rocket" class="w-10 h-10 text-white"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-secondary-900 mb-4">نمو متسارع</h3>
                    <p class="text-secondary-600">زيادة الإنتاجية بنسبة 300% وتقليل الأخطاء 90%</p>
                </div>
                
                <div class="group text-center p-8 rounded-3xl bg-gradient-to-br from-warning-50 to-warning-100 hover:from-warning-100 hover:to-warning-200 transition-all hover:scale-105 hover:shadow-xl">
                    <div class="w-20 h-20 bg-warning-500 rounded-3xl flex items-center justify-center mx-auto mb-6 group-hover:animate-bounce">
                        <i data-lucide="shield" class="w-10 h-10 text-white"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-secondary-900 mb-4">أمان مطلق</h3>
                    <p class="text-secondary-600">حماية عسكرية وتشفير متقدم لبياناتك الحساسة</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 bg-gradient-to-br from-secondary-50 to-primary-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-secondary-900 mb-4">أقسام النظام</h2>
                <p class="text-xl text-secondary-600">إدارة شاملة لجميع جوانب عملك</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="group bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-xl hover:shadow-2xl transition-all hover:scale-105 border border-white/30 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-primary-100 rounded-full -translate-y-16 translate-x-16 group-hover:scale-150 transition-transform duration-500"></div>
                    <div class="relative">
                        <div class="w-20 h-20 bg-gradient-to-br from-primary-500 to-primary-600 rounded-3xl flex items-center justify-center mb-6 group-hover:animate-pulse">
                            <i data-lucide="clipboard-list" class="w-10 h-10 text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-secondary-900 mb-4">دراسة المشاريع</h3>
                        <p class="text-secondary-600 leading-relaxed">إدارة ذكية للمشاريع مع تتبع فوري للميزانيات والجداول الزمنية</p>
                        <div class="flex items-center gap-2 mt-4 text-primary-600">
                            <i data-lucide="trending-up" class="w-4 h-4"></i>
                            <span class="text-sm font-medium">زيادة الكفاءة 85%</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white/70 backdrop-blur-sm rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all hover:scale-105 border border-white/20">
                    <div class="w-16 h-16 bg-success-100 rounded-2xl flex items-center justify-center mb-6">
                        <i data-lucide="users" class="w-8 h-8 text-success-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-secondary-900 mb-4">الموارد البشرية</h3>
                    <p class="text-secondary-600">إدارة شاملة للموظفين والرواتب والأقسام مع نظام متقدم للمتابعة</p>
                </div>

                <div class="bg-white/70 backdrop-blur-sm rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all hover:scale-105 border border-white/20">
                    <div class="w-16 h-16 bg-warning-100 rounded-2xl flex items-center justify-center mb-6">
                        <i data-lucide="scale" class="w-8 h-8 text-warning-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-secondary-900 mb-4">القسم القانوني</h3>
                    <p class="text-secondary-600">إدارة الشؤون القانونية والعقود والقضايا بطريقة منظمة وآمنة</p>
                </div>

                <div class="bg-white/70 backdrop-blur-sm rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all hover:scale-105 border border-white/20">
                    <div class="w-16 h-16 bg-danger-100 rounded-2xl flex items-center justify-center mb-6">
                        <i data-lucide="warehouse" class="w-8 h-8 text-danger-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-secondary-900 mb-4">المستودعات</h3>
                    <p class="text-secondary-600">إدارة المخزون والمواد الغذائية مع تتبع الكميات والمواعيد</p>
                </div>

                <div class="bg-white/70 backdrop-blur-sm rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all hover:scale-105 border border-white/20">
                    <div class="w-16 h-16 bg-primary-100 rounded-2xl flex items-center justify-center mb-6">
                        <i data-lucide="store" class="w-8 h-8 text-primary-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-secondary-900 mb-4">نقاط البيع</h3>
                    <p class="text-secondary-600">إدارة نقاط البيع والمبيعات مع تقارير مفصلة ومتابعة الأرباح</p>
                </div>

                <div class="bg-white/70 backdrop-blur-sm rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all hover:scale-105 border border-white/20">
                    <div class="w-16 h-16 bg-success-100 rounded-2xl flex items-center justify-center mb-6">
                        <i data-lucide="truck" class="w-8 h-8 text-success-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-secondary-900 mb-4">متابعة الآليات</h3>
                    <p class="text-secondary-600">إدارة ومتابعة الآليات والمركبات مع جدولة الصيانة والمتابعة</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Demo Section -->
    <section id="demo" class="py-20 bg-secondary-900 text-white relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-secondary-900 via-primary-900 to-secondary-900 opacity-90"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-4xl font-bold mb-6">شاهد النظام في العمل</h2>
            <p class="text-xl text-secondary-300 mb-12">تجربة تفاعلية لاستكشاف قوة النظام</p>
            
            <div class="bg-white/10 backdrop-blur-sm rounded-3xl p-8 max-w-4xl mx-auto">
                <div class="aspect-video bg-gradient-to-br from-primary-500 to-secondary-600 rounded-2xl flex items-center justify-center">
                    <div class="text-center">
                        <div class="w-24 h-24 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4 hover:scale-110 transition-transform cursor-pointer">
                            <i data-lucide="play" class="w-12 h-12 text-white"></i>
                        </div>
                        <p class="text-white text-lg font-semibold">شاهد العرض التوضيحي</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-secondary-900 mb-4">أرقام تتحدث عن نفسها</h2>
                <p class="text-xl text-secondary-600">نتائج حقيقية من عملائنا</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center">
                <div class="group p-8">
                    <div class="w-24 h-24 bg-gradient-to-br from-primary-500 to-primary-600 rounded-3xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                        <i data-lucide="users" class="w-12 h-12 text-white"></i>
                    </div>
                    <div class="text-5xl font-bold text-primary-600 mb-2 counter" data-target="1000">0</div>
                    <div class="text-secondary-600 font-medium">عميل نشط</div>
                </div>
                
                <div class="group p-8">
                    <div class="w-24 h-24 bg-gradient-to-br from-success-500 to-success-600 rounded-3xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                        <i data-lucide="trending-up" class="w-12 h-12 text-white"></i>
                    </div>
                    <div class="text-5xl font-bold text-success-600 mb-2 counter" data-target="300">0</div>
                    <div class="text-secondary-600 font-medium">% زيادة الإنتاجية</div>
                </div>
                
                <div class="group p-8">
                    <div class="w-24 h-24 bg-gradient-to-br from-warning-500 to-warning-600 rounded-3xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                        <i data-lucide="clock" class="w-12 h-12 text-white"></i>
                    </div>
                    <div class="text-5xl font-bold text-warning-600 mb-2">24/7</div>
                    <div class="text-secondary-600 font-medium">دعم فني</div>
                </div>
                
                <div class="group p-8">
                    <div class="w-24 h-24 bg-gradient-to-br from-danger-500 to-danger-600 rounded-3xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                        <i data-lucide="shield-check" class="w-12 h-12 text-white"></i>
                    </div>
                    <div class="text-5xl font-bold text-danger-600 mb-2 counter" data-target="99">0</div>
                    <div class="text-secondary-600 font-medium">% أمان البيانات</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-gradient-to-br from-primary-500 to-secondary-600 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-4xl font-bold mb-6">جاهز لبدء رحلتك؟</h2>
            <p class="text-xl text-white/90 mb-12 max-w-2xl mx-auto">
                انضم إلى آلاف الشركات التي تثق في نظامنا لإدارة أعمالها
            </p>
            
            <div class="flex flex-col sm:flex-row justify-center gap-6 mb-12">
                <a href="/login" class="group bg-white text-primary-600 hover:bg-primary-50 px-10 py-5 rounded-2xl font-bold text-lg transition-all hover:scale-105 hover:shadow-2xl flex items-center justify-center gap-3">
                    <i data-lucide="rocket" class="w-6 h-6 group-hover:animate-bounce"></i>
                    ابدأ الآن مجاناً
                </a>
                <a href="tel:+963111234567" class="group border-2 border-white text-white hover:bg-white hover:text-primary-600 px-10 py-5 rounded-2xl font-bold text-lg transition-all hover:scale-105 flex items-center justify-center gap-3">
                    <i data-lucide="phone" class="w-6 h-6 group-hover:animate-pulse"></i>
                    اتصل بنا
                </a>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <div class="flex flex-col items-center">
                    <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center mb-4">
                        <i data-lucide="mail" class="w-8 h-8 text-white"></i>
                    </div>
                    <h3 class="font-semibold mb-2">البريد الإلكتروني</h3>
                    <p class="text-white/80">info@business-management.sy</p>
                </div>
                
                <div class="flex flex-col items-center">
                    <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center mb-4">
                        <i data-lucide="phone" class="w-8 h-8 text-white"></i>
                    </div>
                    <h3 class="font-semibold mb-2">هاتف</h3>
                    <p class="text-white/80">+963 11 123 4567</p>
                </div>
                
                <div class="flex flex-col items-center">
                    <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center mb-4">
                        <i data-lucide="map-pin" class="w-8 h-8 text-white"></i>
                    </div>
                    <h3 class="font-semibold mb-2">العنوان</h3>
                    <p class="text-white/80">دمشق - سوريا</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-secondary-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <div class="flex items-center justify-center gap-3 mb-4">
                    <div class="w-10 h-10 bg-primary-500 rounded-xl flex items-center justify-center">
                        <i data-lucide="briefcase" class="w-6 h-6 text-white"></i>
                    </div>
                    <h3 class="text-2xl font-bold">إدارة الأعمال</h3>
                </div>
                <p class="text-secondary-300 mb-6">نظام إدارة شامل لجميع احتياجات عملك</p>
                <p class="text-secondary-400">© 2024 جميع الحقوق محفوظة</p>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            lucide.createIcons();
            
            // Animated Counters
            const counters = document.querySelectorAll('.counter');
            const animateCounter = (counter) => {
                const target = parseInt(counter.getAttribute('data-target'));
                const increment = target / 100;
                let current = 0;
                
                const updateCounter = () => {
                    if (current < target) {
                        current += increment;
                        counter.textContent = Math.ceil(current);
                        requestAnimationFrame(updateCounter);
                    } else {
                        counter.textContent = target;
                    }
                };
                updateCounter();
            };
            
            // Intersection Observer for counters
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        animateCounter(entry.target);
                        observer.unobserve(entry.target);
                    }
                });
            });
            
            counters.forEach(counter => observer.observe(counter));
            
            // Navbar scroll effect
            let lastScrollY = window.scrollY;
            const navbar = document.getElementById('navbar');
            
            window.addEventListener('scroll', () => {
                const currentScrollY = window.scrollY;
                
                if (currentScrollY > 100) {
                    navbar.classList.add('navbar-scrolled');
                } else {
                    navbar.classList.remove('navbar-scrolled');
                }
                
                // Hide/show navbar on scroll
                if (currentScrollY > lastScrollY && currentScrollY > 200) {
                    navbar.style.transform = 'translateY(-100%)';
                } else {
                    navbar.style.transform = 'translateY(0)';
                }
                
                lastScrollY = currentScrollY;
            });
            
            // Smooth scrolling
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                });
            });
        });
        
        // Mobile menu toggle
        window.toggleMobileMenu = function() {
            const mobileMenu = document.getElementById('mobileMenu');
            mobileMenu.classList.toggle('show');
        };
    </script>
</body>
</html>