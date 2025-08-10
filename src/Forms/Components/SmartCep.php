<?php

namespace OtavioAraujo\FilamentSmartCep\Forms\Components;

use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;

class SmartCep extends TextInput
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->mask('99999-999');
        $this->minLength(0);
        $this->maxLength(9);
        $this->required();

        $this->suffixAction(
            Action::make('findCep')
                ->icon('heroicon-s-magnifying-glass')
                ->action(fn () => Notification::make()->success()->title('Buscando CEP....')->send())
        );
    }
}
