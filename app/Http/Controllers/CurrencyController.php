<?php

namespace App\Http\Controllers;

use Library\Currency;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function submit(Request $request)
    {
        $body = self::fetch('https://www.lb.lt/fxrates_csv.lb?tp=EU&rs=1&dte=' . $request->input('date'));

        $array = new Currency(self::bodyToArray($body));
        
        echo 'https://www.lb.lt/fxrates_csv.lb?tp=EU&rs=1&dte=' . $request->input('date');
        
        dd($array->getCurrency());
    }

    private function bodyToArray($body)
    {
        $lines = preg_split('/\n|\r\n?/', $body);
        $values = [];

        for ($i = 0; $i < count($lines); $i++) {

            $line = [];
            $elements = explode(',', $lines[$i]);

            for ($j = 0; $j < 4; $j++)
                array_push($line, $elements[$j]);

            array_push($values, $line);    
        }

        return $values;
    }

    private function fetch($url)
    {
        $client = new Client();
        $response = $client->get($url);

        return $response->getBody();
    }
}
