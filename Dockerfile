FROM php:8.2-apache

# ១. ដំឡើង Dependencies (បន្ថែម libpq-dev សម្រាប់ PostgreSQL)
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libsqlite3-dev \
    libpq-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-install gd pdo pdo_mysql pdo_sqlite pdo_pgsql

# ២. កំណត់ផ្លូវទៅកាន់ public folder
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN a2enmod rewrite

# ៣. ចម្លងកូដ និងដំឡើង Composer
COPY . /var/www/html
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --optimize-autoloader

# ៤. ផ្ដល់សិទ្ធិ (Permissions)
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# ៥. រត់ Migration និងបើក Apache
CMD php artisan migrate --force --seed && apache2-foreground
