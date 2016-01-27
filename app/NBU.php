<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NBU extends Model
{
    public $rate;
    public $currency;

    public function __construct(){
        $xml = simplexml_load_file('http://nbu1.bank.gov.ua/NBUStatService/v1/statdirectory/exchange.xml');

        for ($i=0; $i<count($xml->currency); $i++) {
            $this->rate[$i] = $xml->currency[$i]->rate;
            $this->currency[$i] = $xml->currency[$i]->cc;
        }

    }

}
