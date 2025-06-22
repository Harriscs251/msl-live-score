# Use the official PHP image with necessary extensions
FROM php:8.2-fpm

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    libzip-dev \
    libpq-dev \
    libcurl4-openssl-dev \
    libssl-dev \
    gettext \
    && docker-php-ext-install pdo_pgsql mbstring zip exif pcntl

# Install Composer
COPY --from=composer:2.5 /usr/bin/composer /usr/bin/composer

# Set the working directory
WORKDIR /var/www

# Copy Laravel project files into the container
COPY . .

# Ensure .env exists (for composer post-install hooks)
RUN cp .env.example .env

# Install Laravel PHP dependencies
RUN composer install --prefer-dist --optimize-autoloader --no-dev

# Set proper permissions for Laravel writable directories
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache \
    && chmod -R ug+rwx /var/www/storage /var/www/bootstrap/cache

# Create necessary Laravel storage subdirectories
RUN mkdir -p /var/www/storage/framework/{sessions,views,cache} \
    && chown -R www-data:www-data /var/www/storage

# Copy and enable entrypoint script
COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

# Expose Laravel's internal PHP server port
EXPOSE 8000

# Start Laravel using entrypoint
CMD ["/entrypoint.sh"]
