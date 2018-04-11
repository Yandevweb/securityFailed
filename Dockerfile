FROM php:7.2-apache

RUN apt-get update && apt-get install -y iputils-ping
RUN echo "sammy:$apr1$lzxsIfXG$tmCvCfb49vpPFwKGVsuYz." > /etc/apache2/.htpasswd
RUN docker-php-ext-install mysqli
