# Use PHP official image
FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www

# Install system packages and PHP extensions
RUN apt-get update && apt-get install -y \
    git curl libzip-dev unzip libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo_mysql pdo_pgsql mbstring exif pcntl bcmath gd zip

# Install Composer
COPY --from=composer:2.5 /usr/bin/composer /usr/bin/composer

# Copy Laravel project files into container
COPY . /var/www

# Install PHP dependencies using Composer
RUN composer install --no-dev --optimize-autoloader

# Copy .env file if not exists (Render overrides via envVars anyway)
RUN cp .env.example .env || true

# Generate Laravel application key
RUN php artisan key:generate

# Set permissions
RUN chown -R www-data:www-data /var/www \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Expose port
EXPOSE 8000

# Start Laravel server
CMD php artisan serve --host=0.0.0.0 --port=8000
