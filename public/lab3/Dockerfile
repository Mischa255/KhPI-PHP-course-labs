# Використовуємо офіційний образ PHP + Apache
FROM php:8.2-apache

# Копіюємо файли проєкту у папку сервера
COPY . /var/www/html/

# Увімкнемо модуль Apache mod_rewrite (на всякий випадок)
RUN a2enmod rewrite
