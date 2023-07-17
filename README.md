# Import role & permission in Laravel into Javascript.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/timedoor/laravel-role-js.svg?style=flat-square)](https://packagist.org/packages/timedoor/laravel-role-js)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/backend-timedoor/laravel-role-js/run-tests.yml?branch=master&label=tests&style=flat-square)](https://github.com/backend-timedoor/laravel-role-js/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/backend-timedoor/laravel-role-js/fix-php-code-style-issues.yml?branch=master&label=code%20style&style=flat-square)](https://github.com/backend-timedoor/laravel-role-js/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/timedoor/laravel-role-js.svg?style=flat-square)](https://packagist.org/packages/timedoor/laravel-role-js)

Import roles & permissions data from Laravel into Javascript.

## Installation

You can install the package via composer:

```bash
composer require timedoor/laravel-role-js
```

Don't forget to install [jeremykenedy/laravel-roles](https://github.com/jeremykenedy/laravel-roles) package to use default setting.

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-role-js-config"
```

This is the contents of the published config file:

```php
return [
    'generator' => timedoor\RoleJs\Generator\JeremyKenedyRoleGenerator::class,
];
```

## Initialization

First, publish the JavaScript files that contain logic for roles and permissions. The files will publish to `resources/js/roles` path.
```bash
php artisan role-js:publish
```
if you want to change the publish path, spesify the path in the command.
```bash
php artisan role-js:publish your/publish/path/roles
```

Second, run the command to generate the JavaScript file contains roles & permissions data. It will generate file `data.ts` in the publish path.
```bash
php artisan role-js:generate
```
You can also spesify the publish path in the command.
```bash
php artisan role-js:generate your/publish/path/roles
```

## Usage

You can use the generated file in your JavaScript code.
```typescript
import { HasRolePermission, useRoles } from 'resources/js/roles';

// Example user data with one role
const admin: HasRolePermission = {
    roles: 'admin',
};

const { hasRole, hasPermission } = useRoles(admin);

// Check if user has the given role
if (hasRole('admin')) {
    // Do something
}

// check if user has one of the given roles
if (hasRole(['admin', 'editor'])) {
    // Do something
}

// check if user has a permission
if (hasPermission('edit.users')) {
    // Do something
}

// check if user has one of the given permissions
if (hasPermission(['view.users', 'edit.users'])) {
    // Do something
}

// check if user has all of the given permissions
if (hasPermission(['view.users', 'edit.users'], true)) {
    // Do something
}
```

## Custom Generator

You can create your own generator by implementing `timedoor\RoleJs\Generator\GeneratorInterface` interface.

```php
<?php

namespace App\RoleJs;

use timedoor\RoleJs\Generator\GeneratorInterface;

class CustomRoleGenerator implements GeneratorInterface
{
    /**
     * @return \Illuminate\Support\Collection<int, string>
     */
    public function getRoles()
    {
        return collect(['admin', 'editor']);
    }

    /**
     * @return \Illuminate\Support\Collection<int, string>
     */
    public function getPermissions()
    {
        return collect(['view.users', 'edit.users']);
    }

    /**
     * @return \Illuminate\Support\Collection<string, string[]>
     */
    public function getRolePermissions()
    {
        return collect([
            'admin' => ['view.users', 'edit.users'],
            'editor' => ['view.users'],
        ]);
    }
}
```

Then, change the generator class in the config file.

```php
return [
    'generator' => App\RoleJs\CustomRoleGenerator::class,
];
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
-   [All Contributors](https://github.com/backend-timedoor/laravel-role-js/graphs/contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
