#!/bin/bash
composer install --no-interaction --prefer-dist --optimize-autoloader
rm -rf node_modules package-lock.json
npm install
npm run build
php artisan key:generate
php artisan migrate --force
php artisan storage:link
