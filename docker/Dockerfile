FROM php:7.4-fpm

RUN apt-get update; apt-get install -yq git vim zip;
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer
RUN composer global require laravel/installer
RUN export PATH=$PATH:/root/.composer/vendor/bin
RUN docker-php-ext-install pdo pdo_mysql
RUN apt-get install nodejs -y; apt-get install npm -y;
