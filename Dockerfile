FROM php:8.2-apache

# فعال‌کردن mod_rewrite (برای بعضی پروژه‌ها لازمه)
RUN a2enmod rewrite

# کپی کردن فایل‌ها به دایرکتوری وب سرور
COPY . /var/www/html/

# تنظیم دسترسی
RUN chown -R www-data:www-data /var/www/html

# اگر فایل index.php داری، نیازی به تغییر DocumentRoot نیست
