<?php

namespace Renext\LaraCurrency\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Renext\LaraCurrency\Services\CurrencyRender\CurrencyRender;

class CurrencyController
{
    public function print(Request $request, CurrencyRender $currencyRender)
    {

        //$content = $asciiRender->renderText($path);
        $content = 'bbbbbb';
        return View::make('currency::render', compact('content'));
    }

}