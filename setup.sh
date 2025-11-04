#!/bin/bash
composer install --no-interaction --prefer-dist --optimize-autoloader
php artisan key:generate
php artisan migrate --force
php artisan storage:link
