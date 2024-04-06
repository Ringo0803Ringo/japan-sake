<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Area;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $brands = Brand::where('name', 'like', '%'.$keyword.'%')->paginate(100);
        $areas = Area::all();
        return view('top', [
            'brands' => $brands,
            'keyword' => $keyword ?? '',
            'areas' => $areas
        ]);
    }

    public function search_area(Request $request)
    {
        $area_id = $request->input('area_id');
        $area = Area::with('brands')->find($area_id);
        return view('search_area', compact('area'));
    }
}
