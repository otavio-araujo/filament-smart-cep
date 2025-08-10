<?php

namespace OtavioAraujo\FilamentSmartCep\Commands;

use Illuminate\Console\Command;

class FilamentSmartCepCommand extends Command
{
    public $signature = 'filament-smart-cep';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
