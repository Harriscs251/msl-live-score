FROM php:8.2-fpm

WORKDIR /var/www

# Install system packages and PHP extensions
RUN apt-get update && apt-get install -y \
    git curl libzip-dev unzip libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo_mysql pdo_pgsql mbstring exif pcntl bcmath gd zip

# Install Composer
COPY --from=composer:2.5 /usr/bin/composer /usr/bin/composer

# Copy only composer files first (for layer caching)
COPY composer.json composer.lock ./

# Install dependencies before copying the rest
RUN composer install --no-dev --optimize-autoloader

# Now copy the full Laravel project
COPY . .

# Set permissions
RUN chown -R www-data:www-data /var/www \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Copy .env file if missing
RUN cp .env.example .env || true

# Generate Laravel key
RUN php artisan key:generate

EXPOSE 8000

CMD php artisan serve --host=0.0.0.0 --port=8000
