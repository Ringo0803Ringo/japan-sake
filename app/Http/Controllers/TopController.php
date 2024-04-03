<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Brand;
use App\Models\Area;

class TopController extends Controller
{
    public function get_top() {

        $brands = Brand::paginate(100);
        $areas = Area::all();

        return view('top', compact('brands', 'areas'));
    }

}
