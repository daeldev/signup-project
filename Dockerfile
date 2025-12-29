FROM php:8.2-fpm

# Instala dependências do sistema + nginx
RUN apt-get update && apt-get install -y \
    nginx \
    git unzip libpq-dev libzip-dev libonig-dev \
    libpng-dev libjpeg-dev libfreetype6-dev \
    zip curl \
    && rm -rf /var/lib/apt/lists/*

# Extensões PHP
RUN docker-php-ext-install pdo pdo_pgsql mbstring zip exif bcmath gd

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Diretório de trabalho
WORKDIR /var/www/html

# Copia código
COPY . .

# Instala dependências PHP
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Nginx config
COPY nginx/default.conf /etc/nginx/conf.d/default.conf

# Permissões mínimas
RUN mkdir -p storage bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache

EXPOSE 80

CMD ["sh", "-c", "php-fpm -D && nginx -g 'daemon off;'"]