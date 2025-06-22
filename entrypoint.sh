#!/bin/bash

# Fail if anything errors
set -e

cd /var/www

echo "🔍 Checking .env..."
if [ ! -f .env ]; then
  echo "📄 .env not found, copying from .env.example..."
  cp .env.example .env
fi

if [ ! -d vendor ]; then
  echo "📦 Installing composer packages..."
  composer install --no-dev --optimize-autoloader
fi

if ! grep -q "APP_KEY=base64" .env; then
  echo "🔐 Generating app key..."
  php artisan key:generate
fi

# Optional: Uncomment this if you want automatic migrations
# echo "📂 Running migrations..."
# php artisan migrate --force

echo "🚀 Starting Laravel server..."
php artisan serve --host=0.0.0.0 --port=8000
