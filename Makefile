GENERATOR_VERSION=v7.23.0

php-test:
	vendor/bin/phpunit  test/Api
phpstan:
	vendor/bin/phpstan analyse lib --level 7
php:
	rm -rf docs &&  \
	rm -rf lib/Model && \
	docker run --rm \
	-v ${PWD}:/local openapitools/openapi-generator-cli:$(GENERATOR_VERSION) generate \
		-i https://raw.githubusercontent.com/conekta/openapi/refs/heads/release/v2.3.0/_build/api.yaml \
		-g php \
		-o /local \
		-c /local/config-php.json \
		--global-property modelTests=false

# templates/php/model_generic.mustache es una copia del template upstream con 3 lineas
# modificadas (sin type hint `mixed` en offsetExists/offsetGet/offsetUnset) para mantener
# compatibilidad con PHP 7.4. Al subir GENERATOR_VERSION, correr este target para ver
# que cambio upstream y re-aplicar el parche sobre la nueva version.
sync-templates:
	curl -sf https://raw.githubusercontent.com/OpenAPITools/openapi-generator/$(GENERATOR_VERSION)/modules/openapi-generator/src/main/resources/php/model_generic.mustache \
		-o /tmp/upstream_model_generic.mustache
	diff /tmp/upstream_model_generic.mustache templates/php/model_generic.mustache; true
