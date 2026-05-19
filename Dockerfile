FROM php:8.2-fpm

# ១. ដំឡើង Extensions គ្រឹះរបស់ PHP សម្រាប់រត់ជាមួយ MySQL
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libfreetype6-dev libsqlite3-dev libpq-dev zip unzip git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# ២. ដំឡើង Composer ក្នុង Container សម្រាប់ទាញយក Vendor 
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html

# ៣. ចម្លងកូដគម្រោងទាំងអស់ចូលទៅក្នុង Container
COPY . /var/www/html

# ៤. រត់ដំឡើង packages របស់ Laravel
RUN composer install --no-dev --optimize-autoloader

# ៥. ផ្ដល់សិទ្ធិ Permissions ឱ្យប្រព័ន្ធអាន/សរសេរបានរលូន
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 9000
CMD ["php-fpm"]