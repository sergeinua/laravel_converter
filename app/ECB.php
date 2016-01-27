<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ECB extends Model
{
    public $rate;
    public $currency;

    public function __construct(){

        $xml = simplexml_load_file('https://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml');

        foreach ($xml->Cube as $info) {
            for ($i=0; $i<count($info[0]->Cube[0]->Cube); $i++) {
                $this->rate[$i] = $info[0]->Cube[0]->Cube[$i]['rate'];
                $this->currency[$i] = $info[0]->Cube[0]->Cube[$i]['currency'];
            }
        }

    }
}
