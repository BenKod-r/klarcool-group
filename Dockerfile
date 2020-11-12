FROM php:7.4-apache
RUN a2enmod rewrite
RUN apt-get update && apt-get install -y nano
RUN docker-php-ext-install pdo pdo_mysql
# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

COPY . /var/www/html
ADD ./000-default.conf /etc/apache2/sites-available
