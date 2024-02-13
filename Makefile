php-test:
	vendor/bin/phpunit  test/Api
phpstan:
	vendor/bin/phpstan analyse lib --level 7
php:
	rm -rf docs && \
	rm -rf lib/Model && \
	docker run --rm \
	-v ${PWD}:/local openapitools/openapi-generator-cli:v7.3.0 generate \
		-i https://raw.githubusercontent.com/conekta/openapi/main/_build/api.yaml \
		-g php \
		-o /local \
		-c /local/config-php.json \
		--global-property modelTests=false
