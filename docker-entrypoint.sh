#!/usr/bin/env bash
set -e

# Ensure SQLite file exists if using sqlite
if [ "${DB_CONNECTION:-sqlite}" = "sqlite" ]; then
    touch /var/www/html/database/database.sqlite
fi

php artisan config:clear
php artisan migrate --force
php artisan db:seed --force
php artisan storage:link || true

exec php artisan serve --host=0.0.0.0 --port=${PORT:-8000}
