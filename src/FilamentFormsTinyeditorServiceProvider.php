<?php

namespace Mohamedsabil83\FilamentFormsTinyeditor;

use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentFormsTinyeditorServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-forms-tinyeditor';

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name(static::$name)
            ->hasConfigFile()
            ->hasViews();
    }

    public function packageBooted(): void
    {
        FilamentAsset::register([
            Css::make('skin-light', 'https://cdn.jsdelivr.net/npm/tinymce@5.10.7/skins/ui/oxide/skin.min.css'),
            Css::make('skin-dark', 'https://cdn.jsdelivr.net/npm/tinymce@5.10.7/skins/ui/oxide-dark/skin.min.css'),
            Js::make('tinymce', 'https://cdn.jsdelivr.net/npm/tinymce@5.10.7/tinymce.min.js'),
            Js::make('tiny-editor', __DIR__.'/../resources/dist/js/tiny-editor.js'),
        ], package: 'mohamedsabil83/filament-forms-tinyeditor');
    }
}
