<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'client.'], function () {
    Route::get('/', [\App\Http\Controllers\Client\MapController::class, 'index'])->name('map.show');

    Route::get('/js/{lang}/translation.js', function ($lang) {
        $strings = Cache::rememberForever('client_lang_' . $lang, function () use ($lang) {
            $files = [
                lang_path($lang . '/app.php'),
                lang_path($lang . '/serialize.php'),
            ];
            $strings = [];

            foreach ($files as $file) {
                $name = basename($file, '.php');
                $strings[$name] = require $file;
            }
            return $strings;
        });
        header('Content-Type: text/javascript');
        echo('window.i18n = ' . json_encode($strings));
        exit();
    })->name('translations');
});
