FROM php:8.1-apache

EXPOSE 80
WORKDIR /app

RUN apt-get install -y \
        curl \
    && curl -s https://deb.nodesource.com/setup_16.x | bash - \
    && apt-get update \
    && apt-get install -y \
        unzip \
        git \
        apt-utils \
        libpq-dev \
        libzip-dev \
        libxml2-dev \
        libonig-dev \
        libpng-dev \
        nodejs \
    && apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN docker-php-ext-install -j$(nproc) opcache pdo_mysql mysqli bcmath zip mbstring pdo \
    && docker-php-ext-enable mysqli

RUN a2enmod rewrite

# Composer
COPY --from=composer /usr/bin/composer /usr/bin/composer
