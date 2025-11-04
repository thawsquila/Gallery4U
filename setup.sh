#!/bin/bash
composer install --no-interaction --prefer-dist --optimize-autoloader
npm ci --omit=optional
npm run build
php artisan key:generate
php artisan migrate --force
php artisan storage:link
