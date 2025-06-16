FROM php:7.1-apache

RUN apt-get update \
 && apt-get install -y libpng-dev libjpeg-dev libzip-dev zip \
 && docker-php-ext-install pdo pdo_mysql mysqli \
 && a2enmod rewrite

# agora referenciamos php.ini pela raiz do contexto
COPY docker/php/php.ini /usr/local/etc/php/php.ini

# agora referenciamos conf.conf pela raiz do contexto
COPY docker/apache/conf.conf /etc/apache2/sites-available/000-default.conf

WORKDIR /var/www/html
EXPOSE 80