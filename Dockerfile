# ----------------------
# The FPM base container
# ----------------------
FROM php:8.1-fpm as dev

RUN apt-get update && apt-get install -y \
    git \
    zip \
    curl \
    sudo \
    vim \
    wget \
    unzip \
    libzip-dev \
    libicu-dev \
    libbz2-dev \
    libpng-dev \
    libjpeg-dev \
    libmcrypt-dev \
    libreadline-dev \
    libfreetype6-dev \
    libpq-dev \
    vim \
    g++

RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql

RUN docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/
RUN docker-php-ext-install gd

RUN ln -sf /bin/bash /bin/sh

WORKDIR /var/www/backend


# ----------------------
# Composer install step
# ----------------------
FROM composer:1.10 as build

WORKDIR /var/www/backend

COPY composer.* ./
COPY database/ database/

RUN composer install \
    # --ignore-platform-reqs \
    # --no-plugins \
    # --no-scripts \
    --no-interaction \
    --prefer-dist


# ----------------------
# npm install step
# ----------------------
# FROM node:12-alpine as node

# WORKDIR /var/www/backend

# COPY *.json *.mix.js /app/
# COPY resources /app/resources

# RUN mkdir -p /app/public \
#     && npm install && npm run production



# ----------------------
# The FPM production container
# ----------------------
FROM dev

COPY ./docker_settings/php/www.conf /usr/local/etc/php-fpm.d/www.conf
COPY ./ /var/www/backend/
COPY --from=build /var/www/backend/vendor/ /var/www/backend/vendor/
# COPY --from=node /app/public/js/ /app/public/js/
# COPY --from=node /app/public/css/ /app/public/css/
# COPY --from=node /app/mix-manifest.json /app/public/mix-manifest.json

RUN chmod -R 777 /app/storage
