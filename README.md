# Import role & permission in Laravel into Javascript.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/timedoor/laravel-role-js.svg?style=flat-square)](https://packagist.org/packages/timedoor/laravel-role-js)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/timedoor/laravel-role-js/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/backend-timedoor/laravel-role-js/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/timedoor/laravel-role-js/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/backend-timedoor/laravel-role-js/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/timedoor/laravel-role-js.svg?style=flat-square)](https://packagist.org/packages/timedoor/laravel-role-js)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require timedoor/laravel-role-js
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-role-js-config"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$roleJs = new timedoor\RoleJs();
echo $roleJs->echoPhrase('Hello, timedoor!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

-   [Backend Timedoor](https://github.com/backend-timedoor)
-   [Aryan Jaya](https://github.com/aryanjaya)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
