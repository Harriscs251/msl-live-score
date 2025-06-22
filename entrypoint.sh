#!/bin/bash

set -e
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

echo "🛠 Ensuring required database tables..."
php artisan cache:table || true
php artisan session:table || true
php artisan queue:table || true

echo "📦 Running migrations..."
php artisan migrate --force

echo "🧹 Clearing Laravel cache..."
php artisan config:clear
php artisan cache:clear || true
php artisan view:clear
php artisan route:clear

echo "🧠 Caching fresh Laravel config..."
php artisan config:cache

echo "🚀 Starting Laravel server..."
exec php artisan serve --host=0.0.0.0 --port=8000
