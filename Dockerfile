FROM php:7.4-apache
RUN a2enmod rewrite
RUN apt-get update
RUN docker-php-ext-install pdo pdo_mysql
COPY . /var/www/k-group
ADD ./000-default.conf /etc/apache2/sites-available
