<?php

namespace Library;

use GuzzleHttp\Client;
use Orchestra\Parser\Xml\Facade as XmlParser;

class Parser
{
    public static function bodyToArray($body)
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

    public static function xmlToArray($xml)
    {
        $content = $xml->getContent();

        $element = $content->Cube->Cube;
        $array = json_decode(json_encode($element));
        $content = array_map(fn($value) => ['currency' => $value->{'@attributes'}->currency, 'rate' => $value->{'@attributes'}->rate], $array->Cube);

        return $content;
    }

    public static function fetchXml($url)
    {
        return XmlParser::load(url($url));
    }

    public static function fetchBody($url)
    {
        $client = new Client();
        $response = $client->get($url);

        return $response->getBody();
    }

    public static function getCurrencies($date)
    {
        $xml = self::fetchXml('https://haldus.eestipank.ee/et/export/currency_rates?imported='. $date .'&type=xml');
        $body = self::fetchBody('https://www.lb.lt/fxrates_csv.lb?tp=EU&rs=1&dte='. $date);

        $rate_estonia = Parser::xmlToArray($xml);
        $rate_lithuania = Parser::bodyToArray($body);

        $currencies = [];

        for ($i = 0; $i < count($rate_estonia); $i++)
            array_push($currencies, $rate_estonia[$i]['currency']);
            
        for ($i = 0; $i < count($rate_lithuania); $i++) 
        {
            if (!in_array($rate_lithuania[$i][1], $currencies))
                array_push($currencies, $rate_lithuania[$i][1]);
        }

        return $currencies;
    }
}
