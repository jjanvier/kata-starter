YARN=docker run --rm -it -v $(shell pwd):/home/node/app -w /home/node/app node:23-alpine yarn
NPM=docker run --rm -it -v $(shell pwd):/home/node/app -w /home/node/app node:23-alpine npm
CLI=docker run --rm -it -v $(shell pwd):/home/node/app -e NODE_OPTIONS='--disable-warning=ExperimentalWarning' -w /home/node/app node:23-alpine npx --no-update-notifier tsx

.PHONY: ts
ts:
	${NPM} ${C}

.PHONY: test
test:
	${NPM} test

.PHONY: install
install:
	${NPM} install

.PHONY: test-golden-master
test-golden-master:
	@${CLI} fixtures/texttest_fixture.ts 30 > /tmp/tests.txt
	git diff --ignore-cr-at-eol --ignore-space-at-eol /tmp/tests.txt tests/approvals/ApprovalTest.testTestFixture.approved.txt

.PHONY: fixtures
fixtures:
	@${CLI} fixtures/texttest_fixture.ts ${FIXTURES_LENGTH}

.PHONY: test-coverage
test-coverage:
	${NPM} run coverage
