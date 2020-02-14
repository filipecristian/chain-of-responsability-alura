FROM php:7.4-fpm-alpine3.10

RUN apk --update add --no-cache \
    ${PHPIZE_DEPS} \
    oniguruma-dev \
    libpng-dev \
    openssl-dev \
    nginx \
    supervisor \
    gd \
    nano \
    libxml2-dev \
    git \
    && rm -rf /var/cache/apk/*

RUN docker-php-ext-install \
        pdo_mysql \
        mbstring \
        gd \
        soap \
        xml \
        posix \
        tokenizer \
        ctype \
        pcntl \
        opcache

RUN pecl install -f apcu \
    && echo 'extension=apcu.so' > /usr/local/etc/php/conf.d/30_apcu.ini

RUN pecl install -f mongodb-1.6.1 \
    && echo 'extension=mongodb.so' > /usr/local/etc/php/conf.d/30_mongodb.ini

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug && \
    echo "xdebug.remote_enable=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini && \
    echo "xdebug.remote_handler=dbgp" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini && \
    echo "xdebug.remote_mode=req" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini && \
    echo "xdebug.idekey=FIDC" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini && \
    echo "xdebug.remote_port=9097" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini && \
    echo "xdebug.remote_autostart=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini && \
    echo "xdebug.remote_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini;

RUN chmod -R 755 /usr/local/lib/php/extensions/

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer \
    && chown -R www-data:www-data /var/lib/nginx \
    && chown -R www-data:www-data /var/tmp/nginx \
    && mkdir -p /app \
    && chown -R www-data:www-data /app

WORKDIR /var/www

RUN rm -rf /var/www/html

RUN ln -s public html

EXPOSE 9000

ENTRYPOINT ["php-fpm"]