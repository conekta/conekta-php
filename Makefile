php-test:
	vendor/bin/phpunit  test/Api
phpstan:
	vendor/bin/phpstan analyse lib --level 7