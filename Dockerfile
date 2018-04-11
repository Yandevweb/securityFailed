FROM php:7.2-apache

RUN apt-get update && apt-get install -y iputils-ping
RUN docker-php-ext-install mysqli
