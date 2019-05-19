FROM php:7.3-apache

COPY ./public /var/www/html
RUN apt-get update && apt-get install -y zlib1g-dev libzip-dev && docker-php-ext-install zip
RUN mkdir /var/www/tmp
RUN chmod -R 755 /var/www/html
RUN chown -R root:root /var/www/html
RUN chown www-data:www-data /var/www/tmp
ENV FLAG "HarekazeCTF{l3ts_m4k3_4_f4k3_s3ss10n_d4t4}"

EXPOSE 80