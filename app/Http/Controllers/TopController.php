<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class TopController extends Controller
{
    public function get_top() {

        return view('top');

    }

    public function brands() {

        $tag_id = "laravel";

        $url = "https://muro.sakenowa.com/sakenowa-data/api/brands"; 
        $method = "GET";

        //接続
        $client = new Client();

        $response = $client->request($method, $url);

        $brands = $response->getBody();
        $brands = json_decode($brands, true);

        return view('top', ['brands' => $brands]);
    }
}
