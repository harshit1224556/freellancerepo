#!/usr/bin/env bash
# Exit on error
set -o errexit

echo "Installing PHP dependencies..."
composer install --no-dev --optimize-autoloader

echo "Installing Node dependencies and building assets..."
npm install
npm run build

echo "Setting up database..."
touch database/database.sqlite
php artisan migrate:fresh --seed --force
