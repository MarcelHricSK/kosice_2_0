FROM php:8.0-fpm

RUN apt update \
        && apt install -y \
            g++ \
            libicu-dev \
            libpq-dev \
            libzip-dev \
            zip \
            zlib1g-dev \
            libfreetype6-dev \
            nano \
            libjpeg62-turbo-dev \
            libpng-dev \
            libmcrypt-dev \
            libicu-dev \
            libxml2-dev \
        && docker-php-ext-install \
            intl \
            opcache \
            pdo \
            pdo_mysql \
            mysqli \
            gd

WORKDIR /var/www/laravel-app

RUN cp /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini

RUN sed -E -i -e 's/max_execution_time = 30/max_execution_time = 120/' /usr/local/etc/php/php.ini \
 && sed -E -i -e 's/memory_limit = 128M/memory_limit = 512M/' /usr/local/etc/php/php.ini \
 && sed -E -i -e 's/post_max_size = 8M/post_max_size = 64M/' /usr/local/etc/php/php.ini \
 && sed -E -i -e 's/upload_max_filesize = 2M/upload_max_filesize = 64M/' /usr/local/etc/php/php.ini

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY . /var/www/laravel-app

RUN composer install --no-progress --optimize-autoloader

EXPOSE 9000
CMD ["php-fpm"]
