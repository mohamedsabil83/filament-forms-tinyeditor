# Filament Forms TinyEditor

[![Latest Version on Packagist](https://img.shields.io/packagist/v/mohamedsabil83/filament-forms-tinyeditor.svg?style=flat-square)](https://packagist.org/packages/mohamedsabil83/filament-forms-tinyeditor)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/mohamedsabil83/filament-forms-tinyeditor/run-tests?label=tests)](https://github.com/mohamedsabil83/filament-forms-tinyeditor/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/mohamedsabil83/filament-forms-tinyeditor/Check%20&%20fix%20styling?label=code%20style)](https://github.com/mohamedsabil83/filament-forms-tinyeditor/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/mohamedsabil83/filament-forms-tinyeditor.svg?style=flat-square)](https://packagist.org/packages/mohamedsabil83/filament-forms-tinyeditor)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/filament-forms-tinyeditor.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/filament-forms-tinyeditor)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Installation

You can install the package via composer:

```bash
composer require mohamedsabil83/filament-forms-tinyeditor
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="filament-forms-tinyeditor-migrations"
php artisan migrate
```

You can publish the config file with:
```bash
php artisan vendor:publish --tag="filament-forms-tinyeditor-config"
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-forms-tinyeditor-views"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$filament-forms-tinyeditor = new Mohamedsabil83\FilamentFormsTinyeditor();
echo $filament-forms-tinyeditor->echoPhrase('Hello, Mohamedsabil83!');
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
