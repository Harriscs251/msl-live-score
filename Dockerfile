# Use official PHP image with required extensions
FROM php:8.2-fpm

# Install system dependencies
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

# Install Composer from Composer's official image
COPY --from=composer:2.5 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy all project files
COPY . .

# Set safe TMPDIR (Render sometimes fails with /tmp)
ENV TMPDIR=/var/www/tmp
RUN mkdir -p $TMPDIR

# Install Laravel dependencies correctly
RUN composer install --optimize-autoloader --no-dev

# Set permissions for storage and cache
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache \
    && chmod
