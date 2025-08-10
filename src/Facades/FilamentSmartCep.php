<?php

namespace OtavioAraujo\FilamentSmartCep\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \OtavioAraujo\FilamentSmartCep\FilamentSmartCep
 */
class FilamentSmartCep extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \OtavioAraujo\FilamentSmartCep\FilamentSmartCep::class;
    }
}
