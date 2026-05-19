FROM php:8.2-apache

# ១. ដំឡើង Extensions គ្រឹះរបស់ PHP
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libfreetype6-dev libsqlite3-dev libpq-dev zip unzip git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# ២. កំណត់ផ្លូវទៅកាន់ public folder របស់ Laravel
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN a2enmod rewrite

# ៣. ចម្លងកូដ និងបង្កើតឯកសារ .env
COPY . /var/www/html
RUN cp .env.example .env && php artisan key:generate

# ៤. ដំឡើង Composer ក្នុង Container
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-dev --optimize-autoloader

# ៥. ផ្ដល់សិទ្ធិ Permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# ៦. បញ្ជាផ្ដាច់ព្រ័ត្រ៖ សម្អាត cache -> រត់បង្កើតតារាង និងចាក់ Seeder (គណនី Admin) -> បើក Web Server
CMD php artisan config:clear && php artisan migrate:fresh --seed --force && apache2-foreground