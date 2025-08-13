<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ألوان الهوية البصرية</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-secondary-50 min-h-screen p-6">
    <div class="max-w-6xl mx-auto">
        <h1 class="text-3xl font-bold text-secondary-900 mb-8 text-center">ألوان الهوية البصرية لإدارة الأعمال</h1>
        
        <!-- الألوان الأساسية -->
        <div class="mb-8">
            <h2 class="text-xl font-semibold text-secondary-800 mb-4">الألوان الأساسية (Primary)</h2>
            <div class="grid grid-cols-5 gap-4">
                <div class="bg-primary-500 text-white p-4 rounded-lg text-center font-medium">Primary 500</div>
                <div class="bg-primary-600 text-white p-4 rounded-lg text-center font-medium">Primary 600</div>
                <div class="bg-primary-700 text-white p-4 rounded-lg text-center font-medium">Primary 700</div>
                <div class="bg-primary-800 text-white p-4 rounded-lg text-center font-medium">Primary 800</div>
                <div class="bg-primary-900 text-white p-4 rounded-lg text-center font-medium">Primary 900</div>
            </div>
        </div>

        <!-- الألوان الثانوية -->
        <div class="mb-8">
            <h2 class="text-xl font-semibold text-secondary-800 mb-4">الألوان الثانوية (Secondary)</h2>
            <div class="grid grid-cols-5 gap-4">
                <div class="bg-secondary-100 text-secondary-900 p-4 rounded-lg text-center font-medium">Secondary 100</div>
                <div class="bg-secondary-300 text-secondary-900 p-4 rounded-lg text-center font-medium">Secondary 300</div>
                <div class="bg-secondary-500 text-white p-4 rounded-lg text-center font-medium">Secondary 500</div>
                <div class="bg-secondary-700 text-white p-4 rounded-lg text-center font-medium">Secondary 700</div>
                <div class="bg-secondary-900 text-white p-4 rounded-lg text-center font-medium">Secondary 900</div>
            </div>
        </div>

        <!-- ألوان الحالة -->
        <div class="mb-8">
            <h2 class="text-xl font-semibold text-secondary-800 mb-4">ألوان الحالة</h2>
            <div class="grid grid-cols-4 gap-4">
                <div class="bg-success-500 text-white p-4 rounded-lg text-center font-medium">نجاح</div>
                <div class="bg-warning-500 text-white p-4 rounded-lg text-center font-medium">تحذير</div>
                <div class="bg-danger-500 text-white p-4 rounded-lg text-center font-medium">خطر</div>
                <div class="bg-secondary-500 text-white p-4 rounded-lg text-center font-medium">معلومات</div>
            </div>
        </div>

        <!-- أمثلة على الاستخدام -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- بطاقة إحصائيات -->
            <div class="bg-white rounded-lg shadow-lg p-6 border-t-4 border-primary-500">
                <h3 class="text-lg font-semibold text-secondary-800 mb-2">إجمالي المبيعات</h3>
                <p class="text-3xl font-bold text-primary-600">125,000 ر.س</p>
                <p class="text-success-600 text-sm font-medium">+12% من الشهر الماضي</p>
            </div>

            <!-- بطاقة تنبيه -->
            <div class="bg-warning-50 border border-warning-200 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-warning-800 mb-2">تنبيه مهم</h3>
                <p class="text-warning-700">يوجد 5 مهام تحتاج إلى مراجعة عاجلة</p>
                <button class="mt-3 bg-warning-500 hover:bg-warning-600 text-white px-4 py-2 rounded font-medium">عرض المهام</button>
            </div>

            <!-- بطاقة نجاح -->
            <div class="bg-success-50 border border-success-200 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-success-800 mb-2">تم بنجاح</h3>
                <p class="text-success-700">تم حفظ البيانات بنجاح</p>
            </div>

            <!-- بطاقة خطر -->
            <div class="bg-danger-50 border border-danger-200 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-danger-800 mb-2">خطأ</h3>
                <p class="text-danger-700">فشل في الاتصال بالخادم</p>
                <button class="mt-3 bg-danger-500 hover:bg-danger-600 text-white px-4 py-2 rounded font-medium">إعادة المحاولة</button>
            </div>
        </div>

        <!-- أزرار -->
        <div class="mt-8">
            <h2 class="text-xl font-semibold text-secondary-800 mb-4">الأزرار</h2>
            <div class="flex flex-wrap gap-4">
                <button class="bg-primary-500 hover:bg-primary-600 text-white px-6 py-3 rounded-lg font-medium">أساسي</button>
                <button class="bg-secondary-500 hover:bg-secondary-600 text-white px-6 py-3 rounded-lg font-medium">ثانوي</button>
                <button class="bg-success-500 hover:bg-success-600 text-white px-6 py-3 rounded-lg font-medium">نجاح</button>
                <button class="bg-warning-500 hover:bg-warning-600 text-white px-6 py-3 rounded-lg font-medium">تحذير</button>
                <button class="bg-danger-500 hover:bg-danger-600 text-white px-6 py-3 rounded-lg font-medium">خطر</button>
                <button class="border-2 border-primary-500 text-primary-500 hover:bg-primary-500 hover:text-white px-6 py-3 rounded-lg font-medium">مخطط</button>
            </div>
        </div>
    </div>
</body>
</html>