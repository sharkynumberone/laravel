FROM php:7.4-fpm

RUN apt-get update && apt-get install -y \
        zlib1g-dev \
        libpng-dev \
        curl \
        wget \
        zip \
        unzip \
        git
RUN docker-php-ext-install pdo pdo_mysql gd

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/

CMD ["php-fpm"]
