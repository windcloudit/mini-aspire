#!/bin/sh
# Deploy source from git
cd /home/edugate/edugate

# Checkout lastest source code
git reset --hard
git pull origin

# Start daemon service and bring to background
docker exec -it php-fpm bash -c "php artisan cache:clear"
docker exec -it php-fpm bash -c "php artisan optimize"

# Create folders
mkdir -p storage/logs
mkdir -p storage/framework/sessions
mkdir -p storage/framework/cache
mkdir -p storage/framework/views
touch storage/logs/laravel.log

# Change permission for writable
chmod 777 -R bootstrap
chmod 777 -R storage
