<?php

namespace App\Console\Commands;

use App\Models\Administrator;
use App\Models\Language;
use App\Models\Settings;
use App\Services\SettingsService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class SetupCommand extends Command
{
    protected $signature = 'app:setup';

    protected $description = 'Setup new application';

    public function handle()
    {
        $name = $this->ask('App name');
        $this->info('Setting up application...');
        SettingsService::bootstrap();
        Language::create([
            'code' => 'sk',
            'active' => 1,
        ]);
        Language::create([
            'code' => 'en',
            'active' => 1,
        ]);
        $this->info('Setup was successfully completed.');
    }
}
