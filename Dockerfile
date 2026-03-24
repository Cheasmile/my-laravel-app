FROM php:8.2-apache

# ដំឡើង extensions ដែលចាំបាច់
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev zip unzip git \
    && docker-php-ext-install gd pdo pdo_mysql

# កំណត់ផ្លូវទៅកាន់ public folder របស់ Laravel
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN a2enmod rewrite

# ចម្លងកូដពីកុំព្យូទ័រអ្នក ទៅកាន់ Server (នេះជាកន្លែងដែលវាចម្លងកូដទាំងអស់)
COPY . /var/www/html

# ដំឡើង vendor folder លើ Server
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-dev --optimize-autoloader

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache