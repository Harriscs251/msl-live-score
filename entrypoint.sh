#!/bin/bash

set -e
cd /var/www

echo "🔍 Preparing .env file..."
if [ ! -f .env ]; then
  echo "📄 .env not found. Generating from .env.example using envsubst..."
  envsubst < .env.example > .env
fi

echo "🔐 Checking APP_KEY..."
if ! grep -q "^APP_KEY=base64" .env; then
  echo "⚠️ APP_KEY missing or invalid. Generating..."
  php artisan key:generate
else
  echo "✅ APP_KEY is set."
fi

echo "🛠️ Running migrations..."
php artisan migrate --force

echo "🚀 Starting Laravel server..."
php artisan serve --host=0.0.0.0 --port=8000
