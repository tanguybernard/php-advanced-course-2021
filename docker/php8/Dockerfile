FROM php:8.0-apache

RUN apt-get update
RUN apt-get -y install git
RUN apt-get -y install vim
RUN apt-get -y install zlib1g-dev
RUN apt-get -y install libpng-dev
RUN apt-get -y install libzip-dev
RUN apt-get -y install libpq-dev
RUN apt-get -y install unzip

RUN docker-php-ext-install gd zip pdo pdo_pgsql sockets

RUN a2enmod rewrite

WORKDIR /var/www/html

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer