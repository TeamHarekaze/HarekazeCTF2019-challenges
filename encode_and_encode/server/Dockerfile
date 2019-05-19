FROM php:7.3-apache

COPY ./php.ini $PHP_INI_DIR/php.ini
COPY ./chall /var/www/html
RUN echo "HarekazeCTF{turutara_tattatta_ritta}" > /flag

EXPOSE 80