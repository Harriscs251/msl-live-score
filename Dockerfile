# Use PHP official image
FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www

# ✅ Install system packages and PHP extensions in ONE RUN block
RUN apt-get update && \
    apt-get install -y git curl libzip-dev unzip libpng-dev libonig-dev libxml2-dev libpq-dev && \
    docker-php-ext-install pdo_mysql pdo_pgsql mbstring exif pcntl bcmath gd zip

# ✅ Install Composer from official image
COPY --from=composer:2.5 /usr/bin/composer /usr/bin/composer

# ✅ Copy only composer files first for caching
COPY composer.json composer.lock ./

# ✅ Copy .env.example as .env (needed for package discovery)
COPY .env.example .env

# ✅ Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# ✅ Copy the full Laravel project
COPY . .

# ✅ Copy and set permissions for entrypoint script
COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

# ✅ Set correct permissions for Laravel
RUN chown -R www-data:www-data /var/www && \
    chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# ✅ Expose Laravel port
EXPOSE 8000

# ✅ Start Laravel via entrypoint script
ENTRYPOINT ["/entrypoint.sh"]
