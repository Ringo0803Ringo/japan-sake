<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class TopController extends Controller
{
    public function get_top() {

        return view('top');

    }
}
