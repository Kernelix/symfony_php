FROM php:8.4-fpm-alpine

WORKDIR /var/www/html


RUN apk add --no-cache \
    git \
    unzip \
    wget \
    bash \
    postgresql-dev \
    && docker-php-ext-install pdo pdo_pgsql


RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


RUN wget https://get.symfony.com/cli/installer -O installer && \
    bash installer && \
    mv /root/.symfony5/bin/symfony /usr/local/bin/symfony && \
    rm installer

# Устанавливаем права
RUN chown -R www-data:www-data /var/www/html
