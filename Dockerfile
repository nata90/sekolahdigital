FROM php:8.4-apache

RUN apt-get update && apt-get install -y --no-install-recommends \
        git curl unzip default-mysql-client \
        libpng-dev libonig-dev libxml2-dev libzip-dev libicu-dev pkg-config nodejs npm \
    && docker-php-ext-install pdo_mysql mbstring gd intl zip opcache \
    && docker-php-ext-enable opcache \
    && pecl install redis && docker-php-ext-enable redis \
    && a2enmod rewrite headers \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN groupadd -g 1000 www \
    && useradd -u 1000 -ms /bin/bash -g www www \
    && sed -ri 's/^(export APACHE_RUN_USER=).*/\1www/; s/^(export APACHE_RUN_GROUP=).*/\1www/' /etc/apache2/envvars

COPY docker/apache/vhost.conf /etc/apache2/sites-available/000-default.conf

WORKDIR /var/www

COPY . /var/www
COPY --chown=www:www . /var/www

EXPOSE 80
CMD ["apache2-foreground"]