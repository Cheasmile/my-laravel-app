# ប្តូរមកប្រើ fpm-alpine វិញដើម្បីឱ្យមាន php-fpm ស្រាប់
FROM php:8.3-fpm-alpine

# ១. ដំឡើង Nginx, SQLite និង Extensions
RUN apk add --no-cache \
    nginx \
    sqlite \
    sqlite-dev \
    libxml2-dev \
    oniguruma-dev

RUN docker-php-ext-install pdo pdo_sqlite mbstring xml

# ២. ដំឡើង Composer ផ្លូវការ
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# ៣. កូពីកូដទាំងអស់ចូល
COPY . .

# ៤. បង្កើតឯកសារ SQLite
RUN mkdir -p database && touch database/database.sqlite

# ៥. កំណត់ Nginx Config ឱ្យចង្អុលទៅ public របស់ Laravel និងប្រើប្រាស់ Port 8080
RUN printf 'server {\n\
    listen 8080 default_server;\n\
    root /var/www/html/public;\n\
    index index.php index.html;\n\
    charset utf-8;\n\
    location / {\n\
        try_files $uri $uri/ /index.php?$query_string;\n\
    }\n\
    location ~ \\.php$ {\n\
        fastcgi_pass 127.0.0.1:9000;\n\
        fastcgi_index index.php;\n\
        include fastcgi_params;\n\
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;\n\
    }\n\
}\n' > /etc/nginx/http.d/default.conf

# ៦. ដំឡើង Vendor Packages
RUN composer install --optimize-autoloader --ignore-platform-reqs

# ៧. កំណត់សិទ្ធិ (Permissions) ឱ្យបានទូលំទូលាយ
RUN chmod -R 777 storage bootstrap/cache database

# ៨. បង្កើត App Key
RUN php artisan key:generate

EXPOSE 8080

# ៩. កែសម្រួលបញ្ជាឱ្យរត់ (ប្រើទម្រង់ JSON Array តាមការណែនាំរបស់ Docker)
CMD ["sh", "-c", "export DB_CONNECTION=sqlite && export DB_DATABASE=/var/www/html/database/database.sqlite && php-fpm -D && nginx -g 'daemon off;'"]