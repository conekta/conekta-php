FROM php:7.2-cli-alpine

RUN apk add --no-cache $PHPIZE_DEPS \
	libxml2-dev \
	php-soap \
	git \
        && docker-php-ext-install soap \
     	&& pecl install xdebug \
	&& docker-php-ext-enable xdebug

COPY --from=composer:1.8.5 /usr/bin/composer /usr/bin/composer

RUN composer global require phpunit/phpunit:6.1
