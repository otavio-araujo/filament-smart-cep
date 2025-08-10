<?php

namespace OtavioAraujo\FilamentSmartCep;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentSmartCepServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-smart-cep';

    public static string $viewNamespace = 'filament-smart-cep';

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name);

        $configFileName = $package->shortName();

        if (file_exists($package->basePath("/../config/$configFileName.php"))) {
            $package->hasConfigFile();
        }

        if (file_exists($package->basePath('/../resources/lang'))) {
            $package->hasTranslations();
        }

    }
}
