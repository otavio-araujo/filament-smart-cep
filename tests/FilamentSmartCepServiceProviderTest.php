<?php

use OtavioAraujo\FilamentSmartCep\FilamentSmartCepServiceProvider;

it('can be instantiated', function () {
    $provider = new FilamentSmartCepServiceProvider(app());

    expect($provider)->toBeInstanceOf(FilamentSmartCepServiceProvider::class);
});
