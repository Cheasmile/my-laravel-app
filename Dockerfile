FROM php:8.2-fpm
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libfreetype6-dev libsqlite3-dev libpq-dev zip unzip git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html

# បំបែក Layer ដើម្បីកុំឱ្យ Build យឺត
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --no-autoloader

# Copy កូដថ្មីចូល
COPY . .
RUN composer dump-autoload --optimize
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 9000
CMD ["php-fpm"]