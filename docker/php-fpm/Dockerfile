FROM php:7.4-fpm

RUN apt-get update && apt-get install -y \
    nano \
    git \
    unzip \
    libpq-dev \
    libxml2-dev \
    librabbitmq-dev \
    libssh-dev \
    iputils-ping

RUN echo "$(curl -sS https://composer.github.io/installer.sig) -" > composer-setup.php.sig \
        && curl -sS https://getcomposer.org/installer | tee composer-setup.php | sha384sum -c composer-setup.php.sig \
        && php composer-setup.php && rm composer-setup.php* \
        && chmod +x composer.phar && mv composer.phar /usr/bin/composer

RUN docker-php-ext-install \
    ctype \
    iconv \
    json \
    posix \
    xml

COPY php.ini $PHP_INI_DIR/php.ini


WORKDIR /var/www/symfony

EXPOSE 9000

CMD ["php-fpm"]