EXEC_PHP?=docker run --rm -it -v $(PWD):/usr/src/app/ thecodingmachine/php:8.3-v4-cli
EXEC_PHP_XDEBUG?=docker run --rm -it --env PHP_EXTENSION_XDEBUG=1 --env=XDEBUG_MODE=coverage -v $(PWD):/usr/src/app/ thecodingmachine/php:8.2-v4-cli
FIXTURES_LENGTH?=10

.PHONY: php
php:
	${EXEC_PHP} php

.PHONY: test
test:
	${EXEC_PHP} php vendor/bin/phpunit tests

.PHONY: test-coverage
test-coverage:
	${EXEC_PHP_XDEBUG} php vendor/bin/phpunit tests --coverage-html build/coverage

.PHONY: test-golden-master
test-golden-master:
	@${EXEC_PHP} php fixtures/texttest_fixture.php 31 > /tmp/tests.txt
	git diff /tmp/tests.txt tests/approvals/ApprovalTest.testTestFixture.approved.txt

.PHONY: install
install:
	${EXEC_PHP} composer install

.PHONY: fixtures
fixtures:
	@${EXEC_PHP} php fixtures/texttest_fixture.php ${FIXTURES_LENGTH}
