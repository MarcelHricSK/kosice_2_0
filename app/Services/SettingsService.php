<?php

namespace App\Services;

use App\Models\Settings;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;

class SettingsService
{
    private static function getDefaultSettings()
    {
        return [
            'app_name' => 'EasyQuotation',
            'app_name_client' => 'EasyQuotation',
        ];
    }

    public static function loadFromDB()
    {
        if (Schema::hasTable('settings')) {
            foreach (Settings::all() as $setting) {
                Config::set('settings.' . $setting->key, $setting->value);
            }
            return true;
        }
        return false;
    }

    public static function bootstrap()
    {
        if (Schema::hasTable('settings')) {
            $settings = static::getDefaultSettings();
            foreach ($settings as $key => $setting) {
                Settings::updateOrCreate([
                    'key' => $key,
                ], [
                    'value' => $setting,
                ]);
            }
        }
        return false;
    }
}
