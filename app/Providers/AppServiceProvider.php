<?php

namespace App\Providers;

use App\Services\EncryptionService;
use App\Services\SettingsService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(EncryptionService::class, function () {
            return new EncryptionService(env('APP_ENCRYPTION_KEY'));
        });

        try {
            SettingsService::loadFromDB();
        } catch (\Exception $exception) {
            Log::error('Database unreachable. Skipping settings from DB.');
        }
    }
}
