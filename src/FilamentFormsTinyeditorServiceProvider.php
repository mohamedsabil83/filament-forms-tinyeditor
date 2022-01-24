<?php

namespace Mohamedsabil83\FilamentFormsTinyeditor;

use Filament\Facades\Filament;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentFormsTinyeditorServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-forms-tinyeditor')
            ->hasConfigFile()
            ->hasViews()
            ->hasAssets()
        ;
    }

    public function boot()
    {
        parent::boot();

        if (class_exists(\Filament\FilamentServiceProvider::class)) {
            /*
             * Next lines used to register the tiny scripts when use Filament admin.
             *
             * @phpstan-ignore-next-line
             */
            Filament::serving(function () {
                // @phpstan-ignore-next-line
                Filament::registerScripts($this->getScripts());
            });
        }
    }

    protected function getScripts(): array
    {
        return [
            'filament-forms-tinyeditor' => asset('vendor/filament-forms-tinyeditor/tinymce/tinymce.min.js'),
        ];
    }
}
