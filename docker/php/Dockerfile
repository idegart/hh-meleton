FROM composer:2 as builder

WORKDIR /app

COPY ./composer.json ./composer.lock ./

RUN composer install --prefer-dist --no-suggest --ignore-platform-reqs --no-scripts

FROM php:7-fpm-alpine

RUN apk add --no-cache freetype libpng libjpeg-turbo freetype-dev libpng-dev libjpeg-turbo-dev && \
  docker-php-ext-configure gd \
    --with-freetype \
    --with-jpeg \
  NPROC=$(grep -c ^processor /proc/cpuinfo 2>/dev/null || 1) && \
  docker-php-ext-install -j$(nproc) gd && \
  apk del --no-cache freetype-dev libpng-dev libjpeg-turbo-dev

WORKDIR /app

COPY --from=builder /app ./

COPY ./ ./

RUN cp .env.example .env

CMD php artisan key:generate && php artisan test