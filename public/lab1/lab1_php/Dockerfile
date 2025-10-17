# Використовуємо офіційний PHP-образ
FROM php:8.2-apache

# Копіюємо файли проєкту в контейнер
COPY . /var/www/html/

# Включаємо модуль Apache mod_rewrite (на всякий випадок)
RUN a2enmod rewrite
