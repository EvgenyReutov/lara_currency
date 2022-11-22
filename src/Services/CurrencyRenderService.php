<?php

namespace Renext\LaraCurrency\Services;

use Illuminate\Support\Facades\View;

class CurrencyRenderService implements CurrencyRender
{
    public function getData():array {

        $result = [
            'USD' => '',
            'EUR' => '',
        ];
        $url = 'https://www.cbr.ru/scripts/XML_daily.asp'; // Ссылка на XML-файл с курсами валют, будут самые актуальные значения курса

        //$current_date = date("d/m/Y"); // текущая дата в нужном формате
        //$url = 'https://www.cbr.ru/scripts/XML_daily.asp?date_req='.$current_date; // Ссылка на XML-файл с курсами валют за конкретную дату

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url );
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        $content = curl_exec($ch);
        curl_close($ch);

        $xml = @simplexml_load_string($content);

        foreach ($xml->Valute as $item) {

            // R01235 - Доллар США
            // R01239 - Евро
            if ($item['ID'] == 'R01235') {
                $result['USD'] = $item->Value;
            }
            if ($item['ID'] == 'R01239') {
                $result['EUR'] = $item->Value;
            }
        }

        if (!empty($result['USD'])) {
            $result['USD'] = str_replace(',', '.', $result['USD']); // меняем , на .
        }

        if (!empty($result['EUR'])) {
            $result['EUR'] = str_replace(',', '.', $result['EUR']); // меняем , на .
        }

        return $result;
    }
}