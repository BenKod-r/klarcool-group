FROM php:7.4-apache
RUN a2enmod rewrite
COPY . /var/www/html
ADD ./000-default.conf /etc/apache2/sites-available

RUN apt-get update && apt-get install -y nano
RUN docker-php-ext-install pdo pdo_mysql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*