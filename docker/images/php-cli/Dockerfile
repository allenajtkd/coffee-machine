FROM php:cli-alpine

RUN apk add --update --no-cache oniguruma-dev
RUN docker-php-ext-install mbstring pdo pdo_mysql
