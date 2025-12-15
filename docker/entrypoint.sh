#!/bin/sh

mkdir -p bootstrap/cache
mkdir -p storage/framework/{cache,sessions,views}

chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

exec "$@"