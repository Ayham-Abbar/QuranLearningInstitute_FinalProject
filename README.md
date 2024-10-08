## خطوات تحميل المشروع وتشغيله

### 1. استنساخ المشروع من GitHub
أولاً، قم باستنساخ (clone) المشروع من المستودع على GitHub إلى جهازك المحلي باستخدام الأمر التالي:

```bash
git clone https://github.com/username/repository.git
```

> **ملاحظة:** قم بتعديل الرابط أعلاه ليطابق رابط مستودع المشروع الخاص بك.

### 2. الدخول إلى مجلد المشروع
بعد استنساخ المشروع، انتقل إلى مجلد المشروع:

```bash
cd repository
```

### 3. تثبيت الحزم والاعتمادات باستخدام Composer
تأكد من تثبيت جميع الحزم المطلوبة للمشروع عن طريق استخدام Composer:

```bash
composer install
```

### 4. إعداد ملف البيئة (.env)
قم بنسخ ملف البيئة `.env.example` إلى `.env`:

```bash
cp .env.example .env
```

ثم قم بفتح ملف `.env` وتحديث إعدادات قاعدة البيانات والخدمات الأخرى إذا لزم الأمر.

### 5. إنشاء مفتاح التطبيق
توليد مفتاح التطبيق هو خطوة ضرورية لتشفير البيانات والحفاظ على سلامة الجلسات:

```bash
php artisan key:generate
```

### 6. إعداد قاعدة البيانات
قبل تشغيل عمليات التهجير، تأكد من إنشاء قاعدة البيانات في MySQL (أو أي قاعدة بيانات أخرى تستخدمها). بمجرد إعداد قاعدة البيانات في `.env`، يمكنك تنفيذ الأمر التالي لتطبيق التهجير:

```bash
php artisan migrate
```

### 7. تنفيذ السيدر (Seeder) لملء قاعدة البيانات
لإضافة بيانات افتراضية إلى قاعدة البيانات، قم بتنفيذ السيدر باستخدام:

```bash
php artisan db:seed
```

### 8. تشغيل الخادم المحلي
الآن يمكنك تشغيل المشروع باستخدام الخادم المحلي المدمج في Laravel:

```bash
php artisan serve
```

سيتم تشغيل التطبيق على العنوان الافتراضي `http://localhost:8000`.

---

## ملاحظات إضافية:
- تأكد من أن لديك إصدار PHP المناسب وجميع الاعتمادات الضرورية مثبتة على جهازك.
- يمكنك تعديل إعدادات قاعدة البيانات أو الخدمات الأخرى من خلال ملف `.env`.
- إذا كان هناك أي مشكلة أو خطأ أثناء التثبيت، تحقق من السجلات أو ملفات التكوين.

