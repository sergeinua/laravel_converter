<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class Currency extends Controller
{
    public $model;

    public function load() {

        $data = $this->defineModel();
        if(isset($_GET['model'])){
            $model = $_GET['model'];
        } else {
            $model = 'ECB';
        }

        return view('exchange')->with(['data' => $data, 'model' => $model]);
    }

    public function defineModel(){

        if(isset($_GET['model'])) {
            switch ($_GET['model']) {
                case 'ECB':
                    $model = new \App\ECB();
                    break;
                case 'NBU':
                    $model = new \App\NBU();
                    break;
                default:
                    $model = new \App\ECB();
            }
        } else {
            $model = new \App\ECB();
        }

        return $model;
    }
}
