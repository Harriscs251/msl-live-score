#!/bin/bash

set -e
cd /var/www

echo "🔍 Checking for .env file..."
if [ ! -f .env ]; then
  echo "📄 .env not found. Copying from .env.example..."
  cp .env.example .env
fi

echo "🔐 Checking APP_KEY..."
if grep -q "^APP_KEY=${APP_KEY}" .env && [[ "$APP_KEY" != base64:* ]]; then
  echo "⚠️ APP_KEY is missing or not valid base64. Generating one..."
  php artisan key:generate
else
  echo "✅ APP_KEY is present and valid."
fi

# Optional: Run migrations automatically
# echo "🛠️ Running database migrations..."
# php artisan migrate --force

echo "🚀 Starting Laravel server..."
php artisan serve --host=0.0.0.0 --port=8000
