FROM php:7.4-fpm

ADD https://raw.githubusercontent.com/mlocati/docker-php-extension-installer/master/install-php-extensions /usr/local/bin/

RUN chmod uga+x /usr/local/bin/install-php-extensions && sync
RUN docker-php-ext-install pcntl

RUN DEBIAN_FRONTEND=noninteractive apt-get update -q \
    && install-php-extensions \
      bcmath \
      mysqli \
      pdo_mysql \
      pdo_pgsql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/
RUN chown -R www-data:www-data /var/www

