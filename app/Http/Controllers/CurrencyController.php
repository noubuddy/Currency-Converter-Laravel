<?php

namespace App\Http\Controllers;

use Library\Currency;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;

class CurrencyController extends Controller
{
    public function submit(Request $request)
    {
        $body = self::fetch('https://www.lb.lt/fxrates_csv.lb?tp=EU&rs=1&dte=' . $request->input('date'));

        $body = new Currency(self::bodyToArray($body));
        $xml = self::xmlToArray();

        //dd($body);
        dd($xml);
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

    private function xmlToArray(){
        $xml = XmlParser::load(url('https://haldus.eestipank.ee/et/export/currency_rates?imported=2022-03-04&type=xml'));

        $content = $xml->getContent();

        $element = $content->Cube->Cube;
        $array = json_decode(json_encode($element));
        $content = array_map(fn($value) => ['currency' => $value->{'@attributes'}->currency, 'rate' => $value->{'@attributes'}->rate], $array->Cube);

        return $content;
    }

    private function fetch($url)
    {
        $client = new Client();
        $response = $client->get($url);

        return $response->getBody();
    }

}
