# kata-starter

A preconfigured Docker project to easily start a development kata.

## How to use?

1. Choose a language, and go to that folder.
2. Install the dependencies with `make install`.
3. Launch the tests with `make test`.

You're ready to learn!

## What's available?

### PHP

- PHP version 8.3 (using the [thecodingmachine](https://github.com/thecodingmachine/docker-images-php) Docker images)
- Phpunit version 11+
- Your tests should have the namespace `KataStarter\Test` and be in the `tests/` folder.
- Your production code should have the namespace `KataStarter` and be in the `src/` folder.

### Typescript

TODO

# GildedRose Kata

This is a copy version of [emilybache/GildedRose-Refactoring-Kata](https://github.com/emilybache/GildedRose-Refactoring-Kata/tree/main/php).

See the [specification](https://github.com/emilybache/GildedRose-Refactoring-Kata/blob/main/GildedRoseRequirements.txt) to understand what Gilded Rose is about.

## Folders

- `src` - contains the two classes:
    - `Item.php` - this class should not be changed
    - `GildedRose.php` - this class needs to be refactored, and the new feature added
- `tests` - contains the tests
    - `GildedRoseTest.php` - starter test.
        - Tip: ApprovalTests has been included as a dev dependency, see the PHP version of
          the [Theatrical Players Refactoring Kata](https://github.com/emilybache/Theatrical-Players-Refactoring-Kata/)
          for an example
- `fixtures`
    - `texttest_fixture.php` this could be used for approval tests (or golden master)

## Golden master

The file `php/tests/approvals/ApprovalTest.testTestFixture.approved.txt` represents an output of the program. It can be used as source of truth for the golden master technique. 

Use the following command to compare your current output to this golden master file:

```shell
make test-golden-master
```

To run the fixtures:

```shell
make fixtures
```

You can change the number of fixtures: 

```shell
make fixtures FIXTURES_LENGTH=15
```

## Testing

PHPUnit is configured for testing, a composer script has been provided. To run the unit tests, from the root of the PHP
project run:

```shell script
make test
```

### Tests with Coverage Report

To run all test and generate a html coverage report run:

```shell script
make test-coverage
```

The test-coverage report will be created in /builds, it is best viewed by opening /builds/**index.html** in your
browser.

