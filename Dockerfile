FROM webdevops/php-nginx:7.4

ENV WEB_DOCUMENT_ROOT=/var/www/html/public

RUN apt-get update -y && apt-get install -y \
        libmcrypt-dev \
        zlib1g-dev \
        procps

RUN pecl install stats-2.0.3 \
    && docker-php-ext-enable stats \
    && pecl install xdebug-2.9.0 \
    && pecl install mcrypt-1.0.3 \
    && docker-php-ext-enable xdebug mcrypt
