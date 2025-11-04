#!/bin/bash
composer install --no-interaction --prefer-dist --optimize-autoloader

# Check if npm is available, if not skip frontend build
if command -v npm &> /dev/null; then
    echo "NPM found, building frontend assets..."
    rm -rf node_modules package-lock.json
    npm install
    npm run build
else
    echo "NPM not found, skipping frontend build..."
fi

php artisan key:generate
php artisan migrate --force
php artisan storage:link
