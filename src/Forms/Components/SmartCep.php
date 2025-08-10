<?php

namespace OtavioAraujo\FilamentSmartCep\Forms\Components;

use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Support\Icons\Heroicon;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;
use Livewire\Component as Livewire;

class SmartCep extends TextInput
{
    private string | BackedEnum $actionIcon = Heroicon::OutlinedMagnifyingGlass;

    private string $actionPosition = 'suffix';

    private string $cityField = 'city';

    private string $countryField = 'country';

    private string $countryCodeField = 'country_code';

    private string $ibgeCodeField = 'ibge_code';

    private string $neighborhoodField = 'neighborhood';

    private string $stateField = 'state';

    private string $stateCodeField = 'state_code';

    private string $streetField = 'street';

    /**
     * @throws ConnectionException
     * @throws RequestException
     */
    public function getCep(Livewire $livewire, Component $component, Set $set): void
    {
        $cepResponse = Http::get('https://viacep.com.br/ws/' . $component->getState() . '/json/')
            ->throw()
            ->json();

        if ($cepResponse === []) {
            $livewire->js("document.getElementById('{$component->getKey()}').focus()");

            return;
        }

        if (! empty($cepResponse['logradouro'])) {
            $set($this->streetField, $cepResponse['logradouro']);
        }

        if (! empty($cepResponse['bairro'])) {
            $set($this->neighborhoodField, $cepResponse['bairro']);
        }

        if (! empty($cepResponse['localidade'])) {
            $set($this->cityField, $cepResponse['localidade']);
        }

        if (! empty($cepResponse['estado'])) {
            $set($this->stateField, $cepResponse['estado']);
        }

        if (! empty($cepResponse['uf'])) {
            $set($this->stateCodeField, $cepResponse['uf']);
        }

        if (! empty($cepResponse['ibge'])) {
            $set($this->ibgeCodeField, $cepResponse['ibge']);
        }

        $set($this->countryField, 'Brasil');

        $set($this->countryCodeField, 'BR');
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->mask('99999-999');
        $this->minLength(9);
        $this->maxLength(9);
        $this->required();
        $this->rules(['required', 'min:9', 'max:9']);

        $this->prefixAction(function (): ?Action {
            return ($this->actionPosition === 'prefix')
                ? Action::make('prefixFindCep')
                    ->icon(fn () => $this->actionIcon)
                    ->action(function (Livewire $livewire, Component $component, Set $set) {
                        $livewire->validateOnly($component->getStatePath());
                        $this->getCep($livewire, $component, $set);
                    })
                : null;
        });

        $this->suffixAction(function (): ?Action {
            return ($this->actionPosition === 'suffix')
                ? Action::make('prefixFindCep')
                    ->icon(fn () => $this->actionIcon)
                    ->action(function (Livewire $livewire, Component $component, Set $set) {
                        $livewire->validateOnly($component->getStatePath());
                        $this->getCep($livewire, $component, $set);
                    })
                : null;
        });

    }

    public function actionIcon(string | BackedEnum $icon): self
    {
        $this->actionIcon = $icon;

        return $this;
    }

    public function actionPosition(string $position): self
    {
        $this->actionPosition = $position;

        return $this;
    }

    public function bindCityField(string $cityField): self
    {
        $this->cityField = $cityField;

        return $this;
    }

    public function bindCountryField(string $countryField): self
    {
        $this->countryField = $countryField;

        return $this;
    }

    public function bindCountryCodeField(string $countryCodeField): self
    {
        $this->countryCodeField = $countryCodeField;

        return $this;
    }

    public function bindIbgeCodeField(string $ibgeCodeField): self
    {
        $this->ibgeCodeField = $ibgeCodeField;

        return $this;
    }

    public function bindNeighborhoodField(string $neighborhoodField): self
    {
        $this->neighborhoodField = $neighborhoodField;

        return $this;
    }

    public function bindStateField(string $stateField): self
    {
        $this->stateField = $stateField;

        return $this;
    }

    public function bindStateCodeField(string $stateCodeField): self
    {
        $this->stateCodeField = $stateCodeField;

        return $this;
    }

    public function bindStreetField(string $streetField): self
    {
        $this->streetField = $streetField;

        return $this;
    }
}
