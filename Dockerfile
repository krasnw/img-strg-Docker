FROM php:8.3-apache

# Установка расширений PDO
RUN docker-php-ext-install pdo pdo_mysql

# Копирование исходного кода в образ
COPY . /var/www/html

# Открытие порта 80
EXPOSE 80