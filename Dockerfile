# Stage 1: Use official PHP image with required extensions
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

# Copy all files to container
COPY . .

# Set safe TMPDIR (Render sometimes fails with /tmp)
ENV TMPDIR=/var/www/tmp
RUN mkdir -p $TMPDIR

# Install Laravel dependencies with optimized flags
RUN composer install --prefer-dist --no-scripts --no-plugins --no-dev

# Ensure correct permissions for Laravel
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache \
    && chmod -R ug+rwx /var/www/storage /var/www/bootstrap/cache

# Create required Laravel storage framework directories
RUN mkdir -p /var/www/storage/framework/{sessions,views,cache} \
    && chown -R www-data:www-data /var/www/storage

# Copy and make the entrypoint script executable
COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

# Expose Laravel’s PHP dev server port
EXPOSE 8000

# Launch the app via entrypoint script
CMD ["/entrypoint.sh"]
