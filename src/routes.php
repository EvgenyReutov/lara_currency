<?php

use Illuminate\Support\Facades\Route;
use Renext\LaraCurrency\Controllers\CurrencyController;


if (config('currency.enabled', false))
{
    Route::group([
        'prefix' => config('currency.name', 'currency'),
        'as'     => config('currency.name', 'currency').'.'
    ], function () {

        Route::get('/show_rates', [CurrencyController::class, 'showRates'])->name(
            'showRates'
        );

    });
}