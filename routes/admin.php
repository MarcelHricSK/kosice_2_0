<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\EquipmentController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Admin\OfferOrderController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Client\MapController;
use App\Models\Offer;
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'admin.', 'prefix' => config('settings.url_prefix_admin')], function () {
    Route::group(['middleware' => ['auth.admin:admin']], function () {
        /*
        |--------------------------------------------------------------------------
        | Administration module
        |--------------------------------------------------------------------------
        */
    });

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost']);
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get("/js/translation.js", function () {
        $lang = config('app.locale');
        $strings = Cache::rememberForever('lang_' . $lang, function () use ($lang) {
            $files = [
                lang_path($lang . '/app.php'),
                lang_path($lang . '/form.php'),
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
