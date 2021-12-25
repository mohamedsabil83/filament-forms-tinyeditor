<?php

namespace Mohamedsabil83\FilamentFormsTinyeditor;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentFormsTinyeditorServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-forms-tinyeditor')
            ->hasViews()
            ->hasAssets()
        ;
    }
}
