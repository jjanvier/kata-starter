EXEC_PHP?=docker run --rm -it -v $(PWD):/usr/src/app/ thecodingmachine/php:8.3-v4-cli

.PHONY: php
php:
	${EXEC_PHP} php

.PHONY: test
test:
	${EXEC_PHP} php vendor/bin/phpunit tests

.PHONY: install
install:
	${EXEC_PHP} composer install
