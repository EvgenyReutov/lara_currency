<?php

use Illuminate\Support\Facades\Route;
use Renext\LaraCurrency\Controllers\RenderController;
use Renext\LaraAscii\Controllers\UploadController;

dd(2223);

if (config('currency.enabled', false))
{
    Route::group([
                     'prefix' => config('currency.name', 'currency'),
                     'as'     => config('currency.name', 'currency').'.'
                 ], function () {
        Route::get('/lib', fn() => '<h1>From lib</h1>');

        Route::get('/upload_form', [UploadController::class, 'showForm'])->name(
            'showForm'
        );

        Route::post('/upload', [UploadController::class, 'upload'])->name(
            'upload'
        );

        Route::get('/render', [RenderController::class, 'text'])->name(
            'text'
        );

        Route::get('/html/render', [RenderController::class, 'html'])->name(
            'html'
        );
    });
}