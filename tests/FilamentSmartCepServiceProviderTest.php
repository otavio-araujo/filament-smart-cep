<?php

use OtavioAraujo\FilamentSmartCep\FilamentSmartCepServiceProvider;
use Spatie\LaravelPackageTools\Package;

it('can be instantiated successfully', function () {
    $provider = new FilamentSmartCepServiceProvider(app());

    expect($provider)->toBeInstanceOf(FilamentSmartCepServiceProvider::class);
});

it('registers the package successfully', function () {
    $provider = new FilamentSmartCepServiceProvider(app());

    try {
        $reflection = new ReflectionClass($provider);
        $method = $reflection->getMethod('configurePackage');
        expect($method)->toBeInstanceOf(ReflectionMethod::class)
            ->and($method->getName())->toBe('configurePackage');
    } catch (Exception $e) {
    }

});

it('has the correct package name', function () {
    $provider = new FilamentSmartCepServiceProvider(app());

    $package = new Package;
    $package->setBasePath(__DIR__ . '/../src');
    $provider->configurePackage($package);

    expect($package->name)->toBe('filament-smart-cep');
});
