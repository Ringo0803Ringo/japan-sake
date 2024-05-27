<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Brand;
use App\Models\Area;
use App\Models\Ranking;
use App\Models\Photo;

class TopController extends Controller
{
    public function get_top() {

        $brands = Brand::paginate(20);
        $areas = Area::all();
        $rankings = Ranking::all();
        $photos = Photo::where('brand_id', 312)->get(); 

        return view('top', compact('brands', 'areas', 'rankings', 'photos'));
    }

}
