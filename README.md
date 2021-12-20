# Filament Forms TinyEditor

<img src="https://banners.beyondco.de/Filament%20Forms%20TinyEditor.png?theme=light&packageManager=composer+require&packageName=mohamedsabil83%2Ffilament-forms-tinyeditor&pattern=autumn&style=style_1&description=By+MohamedSabil83&md=1&showWatermark=1&fontSize=100px&images=https%3A%2F%2Flaravel.com%2Fimg%2Flogomark.min.svg" alt="MohamedSabil83"/>

[![Latest Version on Packagist](https://img.shields.io/packagist/v/mohamedsabil83/filament-forms-tinyeditor.svg?style=flat-square)](https://packagist.org/packages/mohamedsabil83/filament-forms-tinyeditor)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/mohamedsabil83/filament-forms-tinyeditor/run-tests?label=tests)](https://github.com/mohamedsabil83/filament-forms-tinyeditor/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/mohamedsabil83/filament-forms-tinyeditor/Check%20&%20fix%20styling?label=code%20style)](https://github.com/mohamedsabil83/filament-forms-tinyeditor/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/mohamedsabil83/filament-forms-tinyeditor.svg?style=flat-square)](https://packagist.org/packages/mohamedsabil83/filament-forms-tinyeditor)

Filament Forms TinyEditor is a package for [Laravel Filament](https://github.com/laravel-filament/filament) that wraps [TinyMce Editor](https://www.tiny.cloud) into a usable component. It's works with [Filament Forms](https://filamentadmin.com/docs/2.x/forms/installation) standalone too.

## Installation

You can install the package via composer:

```bash
composer require mohamedsabil83/filament-forms-tinyeditor
```

Next, you will need to add a `tinymce` configuration entry to your `config/services.php` configuration file as following:

```php
'tinymce' => [
    'key' => 'your-api-key-here',
],
```

You can get a free key by visiting [TinyMce](https://www.tiny.cloud).

## Usage

```php
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

TinyEditor::make('content')
```

To use a simple editor, you may use the `simple()` method:

```php
TinyEditor::make('content')->simple()
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

- [MohamedSabil83](https://github.com/mohamedsabil83)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
