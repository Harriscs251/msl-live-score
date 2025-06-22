# Stage 1: Use official PHP image with required extensions
FROM php:8.2-fpm

# Install system dependencies and required PHP extensions
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

# Copy application files
COPY . .

# Set a safe temporary directory for Render
ENV TMPDIR=/var/www/tmp
RUN mkdir -p $TMPDIR

# Install Laravel dependencies (optimized for production)
RUN composer install --prefer-dist --no-scripts --no-plugins --no-dev

# Create required Laravel directories
RUN mkdir -p /var/www/storage/framework/{sessions,views,cache}

# Fix permissions
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache \
    && chmod -R ug+rwx /var/www/storage /var/www/bootstrap/cache

# Copy and set entrypoint
COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

# Expose port for Laravel dev server
EXPOSE 8000

# Run entrypoint
CMD ["/entrypoint.sh"]
