# DebugBlocks

## Installation

### Requirements

- [Node.js](https://nodejs.org)
- [Composer](https://getcomposer.org)

### Setup

Install the necessary Node.js and Composer dependencies:

```
$ composer install
$ npm install
```

### Available CLI commands

- `composer lint` : checks all PHP files for syntax errors.
- `composer format` : fixes all automatically fixable syntax errors.
- `npm run wp-env` : exposes all commands available in [`@wordpress/env`](https://github.com/WordPress/gutenberg/tree/wp/6.0/packages/env)
- `npm run build` : compiles all scripts and styles for distribution.
- `npm run dev` : compiles all scripts and styles for development.