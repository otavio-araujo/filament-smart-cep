<?php

namespace OtavioAraujo\FilamentSmartCep\Forms\Components;

use Filament\Forms\Components\TextInput;

class SmartCep extends TextInput
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->mask('99999-999');
        $this->minLength(0);
        $this->maxLength(9);
        $this->required();
    }
}
