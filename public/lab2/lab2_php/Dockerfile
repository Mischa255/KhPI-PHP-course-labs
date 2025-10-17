# Використовуємо офіційний PHP-образ з Apache
FROM php:8.2-apache

# Копіюємо всі файли проєкту в кореневу директорію Apache
COPY . /var/www/html/

# Даємо права на запис у uploads і log.txt (щоб PHP міг туди писати)
RUN mkdir -p /var/www/html/uploads && chmod -R 777 /var/www/html/uploads && \
    touch /var/www/html/log.txt && chmod 666 /var/www/html/log.txt

# Відкриваємо порт 80
EXPOSE 80
