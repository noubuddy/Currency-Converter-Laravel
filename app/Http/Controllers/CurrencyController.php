<?php

namespace App\Http\Controllers;

use Library\Parser;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    
    public function submit(Request $request)
    {
        $amount = intval($request->input('amount'));

        $fetched_xml = Parser::fetchXml('https://haldus.eestipank.ee/et/export/currency_rates?imported='. $request->input('date') .'&type=xml');
        $fetched_body = Parser::fetchBody('https://www.lb.lt/fxrates_csv.lb?tp=EU&rs=1&dte=' . $request->input('date'));

        $rate_estonia = Parser::xmlToArray($fetched_xml);
        $rate_lithuania = Parser::bodyToArray($fetched_body);

        // dd($request->input('currency'));

        // dd($rate_estonia, $rate_lithuania);
        // dd($request->input('date'));

        // dd(Parser::getCurrencies(null));

        $currencies = Parser::getCurrencies($request->input('date'));

        return view('welcome', compact('rate_estonia', 'rate_lithuania', 'amount', 'currencies'));
    }
}
