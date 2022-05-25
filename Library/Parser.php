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
}
