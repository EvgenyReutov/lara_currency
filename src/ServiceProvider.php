<?php

namespace Renext\LaraCurrency;

use Renext\LaraCurrency\Services\CurrencyRender\CurrencyRender;
use Renext\LaraCurrency\Services\CurrencyRender\CurrencyRenderService;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
        $this->app->singleton(CurrencyRender::class, CurrencyRenderService::class);
        parent::register();
    }

    public function boot()
    {
        dd(55552);
        $this->mergeConfigFrom(__DIR__ . '/config.php', 'currency');
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
        $this->loadViewsFrom(__DIR__ . '/views', 'currency');

    }
}