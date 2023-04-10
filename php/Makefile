EXEC_PHP=docker-compose run --rm php

.PHONY: php
php:
	${EXEC_PHP}

.PHONY: test
test:
	${EXEC_PHP} php vendor/bin/phpunit tests

.PHONY: install
install:
	${EXEC_PHP} composer install
