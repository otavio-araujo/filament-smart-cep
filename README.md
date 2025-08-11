# Filament Smart CEP

**Filament Smart CEP** is a plugin for **FilamentPHP v4** that validates Brazilian postal codes (CEP) and automatically fills address fields with accurate data.
It uses **[ViaCEP](https://viacep.com.br/)** as the primary API, with multiple backup providers to ensure reliability and uptime.

---

[![Pint](https://github.com/otavio-araujo/filament-smart-cep/actions/workflows/pint.yml/badge.svg)](https://packagist.org/packages/otavio-araujo/filament-smart-cep)
[![PEST](https://github.com/otavio-araujo/filament-smart-cep/actions/workflows/pest.yml/badge.svg)](https://packagist.org/packages/otavio-araujo/filament-smart-cep)
[![PHPStan](https://github.com/CodeWithDennis/larament/actions/workflows/phpstan.yml/badge.svg)](https://github.com/CodeWithDennis/larament/actions/workflows/phpstan.yml)
[![Total Installs](https://img.shields.io/packagist/dt/otavio-araujo/filament-smart-cep.svg?style=flat-square)](https://packagist.org/packages/otavio-araujo/filament-smart-cep)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/otavio-araujo/filament-smart-cep.svg?style=flat-square)](https://packagist.org/packages/otavio-araujo/filament-smart-cep)

---

## Filament Compatibility

Compatible with Filament v4.

___

## ✨ Features

* **CEP validation** with instant feedback.
* **Automatic address filling**: street, neighborhood, city, state, state abbreviation, country, and country abbreviation.
* **Multiple API fallback**: if ViaCEP is unavailable, the plugin tries alternative providers automatically.
* **Seamless FilamentPHP integration** — works out-of-the-box with Forms.
* **Customizable field mapping** to match your resource structure.
* **Fast and lightweight** — no heavy dependencies.

---

## 🚀 How It Works

1. User inputs a Brazilian postal code (CEP) in a Filament form.
2. The plugin validates the code format.
3. The plugin queries **ViaCEP** first.
4. If ViaCEP fails, other APIs are used as fallback.
5. Address fields are automatically populated.

---

## 📦 Installation

You can install the package via composer:

```bash
composer require otavio-araujo/filament-smart-cep
```

---

## ⚙️ Configuration

You can customize:

* Which fields are auto-filled.
* Which field is going to receive focus after CEP autofill.
* Use prefix ou suffix action.

---

## 📖 Basic Usage
The custom field searches for CEP and fills up the form fields with the data returned by the web service.

**By default, the fields that will be filled up are:**
- street;
- neighborhood;
- city;
- state;
- state_code;
- ibge_code;
- country;
- and country_code.

_By default, the number field is focused after field-autofill._

```php
public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                SmartCep::make('postal_code'),

                TextInput::make('street'),
                TextInput::make('neighborhood'),
                TextInput::make('city'),
                TextInput::make('state'),
                TextInput::make('state_code'),
                TextInput::make('ibge_code'),
                TextInput::make('country'),
                TextInput::make('country_code'),
                TextInput::make('number'),
            ]);
    }
```
![Basic Usage](https://raw.githubusercontent.com/otavio-araujo/filament-smart-cep/4b75fca50f5b29ccf571389cd329c8be28b8f46f/art/4x/basic_usage.png)
___

## 🏷️ Using Custom Field Names
If you want to customize the fields that will be filled up, you can chain on the following methods:

```php
public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                SmartCep::make('postal_code')
                    ->bindStreetField('custom_street')
                    ->bindNeighborhoodField('custom_neighborhood')
                    ->bindCityField('custom_city')
                    ->bindStateField('custom_state')
                    ->bindStateCodeField('custom_state_code')
                    ->bindIbgeCodeField('custom_ibge_code')
                    ->bindCountryField('custom_country')
                    ->bindCountryCodeField('custom_country_code'),

                TextInput::make('custom_street'),
                TextInput::make('custom_neighborhood'),
                TextInput::make('custom_city'),
                TextInput::make('custom_state'),
                TextInput::make('custom_state_code'),
                TextInput::make('custom_ibge_code'),
                TextInput::make('custom_country'),
                TextInput::make('custom_country_code'),
                TextInput::make('number'),
            ]);
    }
```
![Basic Usage](https://raw.githubusercontent.com/otavio-araujo/filament-smart-cep/4.x/art/4x/custom_fields.png?raw=true)

---

## ⏪🖌️⏩ Customize Action's Button Icon and Position
If you want to customize the action's button icon and position, you can chain on the following methods:
```php
public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                SmartCep::make('postal_code')
                    ->actionIcon(Heroicon::OutlinedDocumentMagnifyingGlass), // Default: Heroicon::OutlinedMagnifyingGlass 
                    ->actionPosition('prefix') // Options: 'prefix', 'suffix' | Default: 'suffix'
            ]);
    }
```

---

## 🎯 Set Focus on an Input After Filling up the Fields
If you want to set focus on an input after filling up the fields, you can chain on the following methods:

```php
public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                SmartCep::make('postal_code')
                    ->nextFocusField('number'),
                ...
                TextInput::make('number'),
            ]);
    }
```

---

## 👨‍💻 Code Quality

```bash
composer analyse
```
```bash
composer lint
```
```bash
composer test
```

---

## 📋 Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

---

## 🤝 Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

---

## 🛡️ Security Vulnerabilities

Please review [our security policy](.github/SECURITY.md) on how to report security vulnerabilities.

---

## ⭐ Credits

- [Otávio Araújo](https://github.com/otavio-araujo)
- [All Contributors](.github/CONTRIBUTING.md)

---
## 🚨 License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
