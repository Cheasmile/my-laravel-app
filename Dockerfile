# Live automation test for coffee shop website
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

# ៤. បង្កើតឯកសារ SQLite និង Folder ឱ្យបានត្រឹមត្រូវ
RUN mkdir -p database storage bootstrap/cache && touch database/database.sqlite

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
    }\n\
}\n' > /etc/nginx/http.d/default.conf

# ៦. ដំឡើង Vendor Packages
RUN composer install --optimize-autoloader --ignore-platform-reqs

# ៧. កំណត់សិទ្ធិ (Permissions) ឱ្យបានទូលំទូលាយ
RUN chmod -R 777 storage bootstrap/cache database

EXPOSE 8080

# ៨. កំណត់បញ្ជាឱ្យរត់អូតូពេលបើក Container (បង្កើត .env, key, migrate រួចរត់ server ភ្លាម)
CMD ["sh", "-c", "cp .env.example .env && touch database/database.sqlite && export DB_CONNECTION=sqlite && export DB_DATABASE=/var/www/html/database/database.sqlite && php artisan key:generate && php artisan migrate --force && php-fpm -D && nginx -g 'daemon off;'"]