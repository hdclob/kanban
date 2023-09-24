FROM php:8.2-apache
# COPY ../ /var/www/html
COPY ./php.ini /usr/local/etc/php/php.ini
RUN usermod -u 1002 www-data
RUN a2enmod rewrite
RUN docker-php-ext-install mysqli pdo pdo_mysql
EXPOSE 80