<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>اختبار Tailwind CSS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden">
        <div class="p-8">
            <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">اختبار خط تجوال</div>
            <h1 class="block mt-1 text-2xl leading-tight font-bold text-black">مرحباً بك في Laravel مع خط تجوال</h1>
            <p class="mt-2 text-gray-600 font-medium">هذا النص مكتوب بخط تجوال الجميل والواضح للقراءة باللغة العربية.</p>
            
            <div class="mt-4 p-4 bg-gray-50 rounded-lg">
                <h2 class="text-lg font-bold mb-2">أوزان الخط المختلفة:</h2>
                <p class="font-light">نص بوزن خفيف (Light)</p>
                <p class="font-normal">نص بوزن عادي (Normal)</p>
                <p class="font-medium">نص بوزن متوسط (Medium)</p>
                <p class="font-semibold">نص بوزن شبه عريض (Semibold)</p>
                <p class="font-bold">نص بوزن عريض (Bold)</p>
                <p class="font-extrabold">نص بوزن عريض جداً (Extra Bold)</p>
                <p class="font-black">نص بوزن أسود (Black)</p>
            </div>
            
            <div class="mt-6 space-y-4">
                <button class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    زر أزرق
                </button>
                
                <button class="w-full bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    زر أخضر
                </button>
                
                <div class="grid grid-cols-3 gap-4">
                    <div class="bg-red-100 p-4 rounded text-center font-medium">أحمر</div>
                    <div class="bg-yellow-100 p-4 rounded text-center font-medium">أصفر</div>
                    <div class="bg-purple-100 p-4 rounded text-center font-medium">بنفسجي</div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>