FROM php:7.0-apache

RUN docker-php-ext-install mysqli

# Copy dep files first so Docker caches the install step if they don't change
ADD . /var/www/html

WORKDIR /var/www/html

RUN usermod -u 1000 www-data
RUN chown -R www-data:www-data /var/www/html
