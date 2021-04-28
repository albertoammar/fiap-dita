#
# Instalar dependencias do Composer
#
FROM composer:1.9.3 as composer
FROM albertoammar/nginx:php-7.4.1-alpine as build

WORKDIR /app
# Copiar composer
COPY --from=composer /usr/bin/composer /usr/local/bin/composer
COPY . .
RUN composer install
RUN composer dump-autoload -o

FROM php:7.4-apache

COPY --from=composer /usr/bin/composer /usr/local/bin/composer

RUN docker-php-ext-install mysqli pdo_mysql
RUN a2enmod rewrite
RUN apt-get -y update \
    && apt-get install -y libicu-dev \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl
RUN pecl install -o -f redis \
&&  rm -rf /tmp/pear \
&&  docker-php-ext-enable redis
RUN apt-get install -y --no-install-recommends \
    build-essential \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libmcrypt-dev \
    libpng-dev \
    libwebp-dev \
    curl \
    libcurl4 \
    libcurl4-openssl-dev \
    zlib1g-dev \
    libicu-dev \
    libmemcached-dev \
    memcached \
    default-mysql-client \
    libmagickwand-dev \
    unzip \
    libzip-dev \
    zip \
    nano
RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install -j$(nproc) gd

COPY . /var/www
RUN mv -T /var/www/public /var/www/html
COPY --from=build /app/vendor /var/www/vendor

RUN cd /var/www/ && composer dump-autoload -o

WORKDIR /var/www
RUN chown -R $USER:www-data /var/www/storage/*
RUN chmod -R 0777 /var/www/storage
