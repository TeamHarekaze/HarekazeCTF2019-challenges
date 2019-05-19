FROM php:7.3-apache

COPY ./public /var/www/html
RUN apt-get update && apt-get install -y libsqlite3-dev && docker-php-ext-install pdo_sqlite
RUN mkdir /var/www/db
COPY ./vote.db /var/www/db/vote.db
RUN chmod -R 755 /var/www/html
RUN chown -R root:root /var/www/html
RUN chown -R www-data:www-data /var/www/db
RUN chmod -R 777 /var/www/db

EXPOSE 80