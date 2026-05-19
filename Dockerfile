FROM php:8.2-apache

# ១. ដំឡើង Extensions គ្រឹះរបស់ PHP
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libfreetype6-dev libsqlite3-dev libpq-dev zip unzip git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# ២. កំណត់ផ្លូវទៅកាន់ public folder របស់ Laravel ឱ្យត្រូវជាមួយ Apache
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN a2enmod rewrite

# ៣. ចម្លងកូដចូលទៅក្នុង Container
COPY . /var/www/html

# ៤. ដំឡើង Composer និងទាញយក Packages
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-dev --optimize-autoloader

# ៥. រៀបចំឯកសារ .env និងបង្កើត Key ទុកជាមុនសម្រាប់ការរត់ Production
RUN if [ ! -f .env ]; then cp .env.example .env; fi
RUN php artisan key:generate --force

# ៦. ផ្ដល់សិទ្ធិ Permissions ឱ្យ Apache អាចអាន និងសរសេរបាន
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# ៧. បើកដំណើរការ Apache Web Server
CMD php artisan config:cache && php artisan route:cache && apache2-foreground