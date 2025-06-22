#!/bin/bash

set -e  # Exit immediately if any command fails
cd /var/www

echo "📄 Checking .env file..."
if [ ! -f .env ]; then
  echo "📄 .env not found. Copying from .env.example..."
  cp .env.example .env
fi

echo "🔐 Verifying APP_KEY..."
if ! grep -q "^APP_KEY=base64" .env; then
  echo "⚠ APP_KEY is missing or invalid. Generating..."
  php artisan key:generate --force
else
  echo "✅ APP_KEY exists."
fi

echo "🧹 Clearing and caching Laravel config..."
php artisan config:clear
php artisan config:cache

echo "🛠 Running database migrations..."
php artisan migrate --force

echo "🚀 Starting Laravel server..."
exec php artisan serve --host=0.0.0.0 --port=8000
