FROM php:8.2.1-cli-alpine

RUN apk add --no-cache $PHPIZE_DEPS \
	libxml2-dev \
	php-soap linux-headers bash \
	git \
        && docker-php-ext-install soap \
     	&& pecl install xdebug \
	&& docker-php-ext-enable xdebug

COPY --from=composer:2.5.1 /usr/bin/composer /usr/bin/composer

RUN composer global require phpunit/phpunit  ~9

RUN echo 'alias phpunit="./vendor/bin/phpunit"' >> ~/.bashrc
