<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Brand;

class TopController extends Controller
{
    public function get_top() {

        $brands = Brand::all();

        return view('top', ['brands' => $brands]);
    }

}
