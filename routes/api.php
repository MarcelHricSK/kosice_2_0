<?php

use Illuminate\Support\Facades\Route;

Route::group(['as' => 'api.', 'prefix' => 'v1'], function () {
    Route::post('/points', [\App\Http\Controllers\Client\Api\MapController::class, 'index'])->name('map.points');
    Route::get('/points/{id}', [\App\Http\Controllers\Client\Api\MapController::class, 'show'])->name('map.point');
});
