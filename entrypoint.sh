#!/bin/bash

set -e

cd /var/www

echo "🔍 Checking for .env file..."
if [ ! -f .env ]; then
  echo "📄 .env not found. Copying from .env.example..."
  cp .env.example .env
fi

if [ ! -d vendor ]; then
  echo "📦 Installing Composer dependencies..."
  composer install --no-dev --optimize-autoloader
fi

if ! grep -q "APP_KEY=base64" .env; then
  echo "🔐 Generating application key..."
  php artisan key:generate
fi

# Optional: Uncomment below to run migrations automatically
# echo "🛠️ Running database migrations..."
# php artisan migrate --force

echo "🚀 Starting Laravel server..."
php artisan serve --host=0.0.0.0 --port=8000
