<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class AreaController extends Controller
{
    public function areas() {

        $tag_id = "laravel";

        $url = "https://muro.sakenowa.com/sakenowa-data/api/areas"; 
        $method = "GET";

        //接続
        $client = new Client();

        $response = $client->request($method, $url);

        $areas = $response->getBody();
        $areas = json_decode($areas, true);

        return view('top', ['areas' => $areas]);
    }
}
