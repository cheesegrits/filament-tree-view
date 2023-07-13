# A Filament PHP plugin for rendering tables as tree views

[![Latest Version on Packagist](https://img.shields.io/packagist/v/cheesegrits/filament-tree-view.svg?style=flat-square)](https://packagist.org/packages/cheesegrits/filament-tree-view)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/cheesegrits/filament-tree-view/run-tests?label=tests)](https://github.com/cheesegrits/filament-tree-view/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/cheesegrits/filament-tree-view/Check%20&%20fix%20styling?label=code%20style)](https://github.com/cheesegrits/filament-tree-view/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/cheesegrits/filament-tree-view.svg?style=flat-square)](https://packagist.org/packages/cheesegrits/filament-tree-view)



This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require cheesegrits/filament-tree-view
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="filament-tree-view-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-tree-view-config"
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-tree-view-views"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$filament-tree-view = new Cheesegrits\FilamentTreeView();
echo $filament-tree-view->echoPhrase('Hello, Cheesegrits!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Hugh Messenger](https://github.com/cheesegrits)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
