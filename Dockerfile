# Use PHP official image
FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www

# Install system packages and PHP extensions
RUN apt-get update && apt-get install -y \
    git curl libzip-dev unzip libpng-dev libonig-dev libxml2-dev \
    libpq-dev \                             # ✅ Needed for PostgreSQL
    && docker-php-ext-install pdo_mysql pdo_pgsql mbstring exif pcntl bcmath gd zip

# Install Composer
COPY --from=composer:2.5 /usr/bin/composer /usr/bin/composer

# Copy only composer files first for caching
COPY composer.json composer.lock ./

# Install PHP dependencies using Composer
RUN composer install --no-dev --optimize-autoloader

# Copy the entire project
COPY . .

# Copy and enable entrypoint script
COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

# Set permissions for Laravel writable folders
RUN chown -R www-data:www-data /var/www \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Expose Laravel dev port
EXPOSE 8000

# Use the custom entrypoint script
ENTRYPOINT ["/entrypoint.sh"]
