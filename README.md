# Filament Smart CEP

**Filament Smart CEP** is a plugin for **FilamentPHP v4** that validates Brazilian postal codes (CEP) and automatically fills address fields with accurate data.
It uses **[ViaCEP](https://viacep.com.br/)** as the primary API, with multiple backup providers to ensure reliability and uptime.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/otavio-araujo/filament-smart-cep.svg?style=flat-square)](https://packagist.org/packages/otavio-araujo/filament-smart-cep)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/otavio-araujo/filament-smart-cep/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/otavio-araujo/filament-smart-cep/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/otavio-araujo/filament-smart-cep/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/otavio-araujo/filament-smart-cep/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/otavio-araujo/filament-smart-cep.svg?style=flat-square)](https://packagist.org/packages/otavio-araujo/filament-smart-cep)

## ✨ Features

* **CEP validation** with instant feedback.
* **Automatic address filling**: street, neighborhood, city, state, state abbreviation, country, and country abbreviation.
* **Multiple API fallback**: if ViaCEP is unavailable, the plugin tries alternative providers automatically.
* **Seamless FilamentPHP integration** — works out-of-the-box with Forms.
* **Customizable field mapping** to match your resource structure.
* **Fast and lightweight** — no heavy dependencies.

## 🚀 How It Works

1. User inputs a Brazilian postal code (CEP) in a Filament form.
2. The plugin validates the code format.
3. The plugin queries **ViaCEP** first.
4. If ViaCEP fails, other APIs are used as fallback.
5. Address fields are automatically populated.

## 📦 Installation

```bash
composer require otavio-araujo/filament-smart-cep
```

## ⚙️ Configuration

You can customize:

* Which fields are auto-filled.
* Which APIs are used as fallback.
* Error messages and validation behavior.

---




