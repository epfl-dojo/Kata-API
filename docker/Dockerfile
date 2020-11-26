FROM php:7.4-fpm

RUN apt-get update; apt-get install -yq git;
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer
RUN composer global require laravel/installer
RUN export PATH=$PATH:/root/.composer/vendor/bin
