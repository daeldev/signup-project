#!/bin/sh
set -e

# 1. Cria .env se não existir
if [ ! -f /var/www/html/.env ]; then
    cp /var/www/html/.env.example /var/www/html/.env
fi

# 2. Gera APP_KEY se não existir
php artisan key:generate --force

# 3. Cria cache e storage, garante permissão
mkdir -p bootstrap/cache
mkdir -p storage/framework/{cache,sessions,views}
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

# 4. Roda migrations (opcional)
php artisan migrate --force

# 5. Executa comando padrão
exec "$@"