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

- Node version 23+
- Jest version 29+ with TS enabled
