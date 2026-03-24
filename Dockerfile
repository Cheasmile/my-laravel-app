FROM php:8.2-apache

# ១. ដំឡើង extensions ដែលចាំបាច់ (បន្ថែម libsqlite3-dev សម្រាប់ SQLite)
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libsqlite3-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-install gd pdo pdo_mysql pdo_sqlite

# ២. កំណត់ផ្លូវទៅកាន់ public folder របស់ Laravel
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN a2enmod rewrite

# ៣. ចម្លងកូដពីកុំព្យូទ័រអ្នក ទៅកាន់ Server
COPY . /var/www/html

# ៤. ដំឡើង Composer និង Vendor folders
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-dev --optimize-autoloader

# ៥. ផ្ដល់សិទ្ធិ (Permissions) ទៅឱ្យ Folder សំខាន់ៗ រួមទាំង database ផងដែរ
RUN chown -R www-data:www-data /var/www/html/storage \
    /var/www/html/bootstrap/cache \
    /var/www/html/database

# ៦. បញ្ជាឱ្យរត់ Migration និងបើក Apache (CMD នេះសំខាន់បំផុតសម្រាប់គម្រោង Free)
CMD php artisan migrate --force && apache2-foreground