# دليل تشغيل المشروع

## المتطلبات الأساسية

- PHP 8.1 أو أحدث
- Composer
- MySQL أو MariaDB
- Node.js و npm (اختياري للـ frontend assets)

## خطوات التشغيل

### 1. تحميل المشروع
```bash
git clone <repository-url>
cd HomeWorkProject
```

### 2. تثبيت التبعيات
```bash
composer install
```

### 3. إعداد ملف البيئة
```bash
cp .env.example .env
```

### 4. تحديث إعدادات قاعدة البيانات في ملف `.env`
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 5. إنشاء مفتاح التطبيق
```bash
php artisan key:generate
```

### 6. إنشاء قاعدة البيانات وتشغيل الـ migrations
```bash
php artisan migrate
```

### 7. تشغيل الخادم المحلي
```bash
php artisan serve
```

المشروع سيعمل على: `http://localhost:8000`

## إعدادات إضافية (اختيارية)

### تثبيت frontend dependencies
```bash
npm install
npm run dev
```

### تشغيل الـ seeders (إذا كانت متوفرة)
```bash
php artisan db:seed
```

### إنشاء رابط تخزين الملفات
```bash
php artisan storage:link
```

## استكشاف الأخطاء

- تأكد من أن PHP و Composer مثبتان بشكل صحيح
- تحقق من إعدادات قاعدة البيانات في ملف `.env`
- تأكد من أن قاعدة البيانات تعمل وأن المستخدم لديه الصلاحيات المطلوبة
- في حالة مشاكل الصلاحيات، قم بتشغيل:
```bash
chmod -R 775 storage bootstrap/cache
```