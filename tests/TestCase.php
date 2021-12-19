<?php

namespace Mohamedsabil83\FilamentFormsTinyeditor\Tests;

use Mohamedsabil83\FilamentFormsTinyeditor\FilamentFormsTinyeditorServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            FilamentFormsTinyeditorServiceProvider::class,
        ];
    }
}
