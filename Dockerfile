FROM php:8.3-cli-alpine AS builder
WORKDIR /app
COPY . .
RUN apk add --no-cache git unzip
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader --no-scripts

FROM php:8.3-fpm-alpine
WORKDIR /var/www/html

RUN apk add --no-cache \
    libpq-dev \
    libpng-dev \
    zlib-dev \
    $PHPIZE_DEPS \
    && docker-php-ext-install bcmath pdo_pgsql \
    && pecl install redis \
    && docker-php-ext-enable redis \
    && apk del $PHPIZE_DEPS

COPY --from=builder /app /var/www/html
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 9000
CMD ["php-fpm"]
