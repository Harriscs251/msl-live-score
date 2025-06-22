# Use the official PHP image with FPM
FROM php:8.2-fpm

# Install required system packages and PHP extensions
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
    && docker-php-ext-install pdo pdo_pgsql mbstring zip exif pcntl

# Install Composer (from Composer's official image)
COPY --from=composer:2.5 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy Laravel project files
COPY . .

# Copy .env.example into .env if needed (will be overwritten by entrypoint anyway)
RUN cp .env.example .env

# Install dependencies (without dev tools)
RUN composer install --prefer-dist --optimize-autoloader --no-dev

# Fix Laravel storage and bootstrap/cache permissions
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache \
    && chmod -R ug+rwx /var/www/storage /var/www/bootstrap/cache

# Create required Laravel directories
RUN mkdir -p /var/www/storage/framework/{sessions,views,cache} \
    && chown -R www-data:www-data /var/www/storage

# Copy and allow execution of the entrypoint script
COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

# Expose Laravel's internal port
EXPOSE 8000

# Launch entrypoint
CMD ["/entrypoint.sh"]
