# ១. ប្រើ PHP ជាមួយ Apache
FROM php:8.2-apache

# ២. ដំឡើង System dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# ៣. កំណត់ Apache Document Root ទៅកាន់ public folder របស់ Laravel
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# ៤. បើក Apache rewrite mode (សម្រាប់ Laravel Routes)
RUN a2enmod rewrite

# ៥. ចម្លងកូដក្នុងម៉ាស៊ីនចូលទៅក្នុង Docker
COPY . /var/www/html

# ៦. ដំឡើង Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-dev --optimize-autoloader

# ៧. កំណត់សិទ្ធិ (Permissions) ឱ្យ Storage និង Cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# ៨. កំណត់ Port ឱ្យត្រូវតាម Render
EXPOSE 80