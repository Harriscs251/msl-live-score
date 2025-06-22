#!/bin/bash

set -e

cd /var/www

echo "🔍 Checking for .env file..."
if [ ! -f .env ]; then
  echo "📄 .env not found. Copying from .env.example..."
  cp .env.example .env
fi

echo "🔐 Checking APP_KEY..."
if ! grep -q "^APP_KEY=base64" .env && [ -z "$APP_KEY" ]; then
  echo "📦 No APP_KEY found in .env or environment. Generating one..."
  php artisan key:generate
else
  echo "✅ APP_KEY already exists."
fi

# Optional: Run migrations automatically
# echo "🛠️ Running database migrations..."
# php artisan migrate --force

echo "🚀 Starting Laravel server..."
php artisan serve --host=0.0.0.0 --port=8000
