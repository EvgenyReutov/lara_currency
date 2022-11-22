<?php

namespace Renext\LaraCurrency\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Renext\LaraCurrency\Services\CurrencyRender;

class CurrencyController
{
    public function showRates(Request $request, CurrencyRender $currencyRender)
    {
        $rates = $currencyRender->getData();
        return View::make('currency::render', compact('rates'));
    }

}