FROM php:8.2-fpm

# Dependências do sistema
RUN apt-get update && apt-get install -y \
    git unzip libpq-dev libzip-dev libonig-dev \
    libpng-dev libjpeg-dev libfreetype6-dev \
    zip curl nodejs npm build-essential \
    && rm -rf /var/lib/apt/lists/*

# Extensões PHP necessárias
RUN docker-php-ext-install \
    pdo pdo_pgsql mbstring zip exif pcntl bcmath gd

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Diretório da aplicação
WORKDIR /var/www/html

# Porta do PHP-FPM
EXPOSE 9000

# Comando padrão
CMD ["php-fpm"]