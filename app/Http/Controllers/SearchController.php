<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Area;
use App\Models\Brewery;

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

    public function area_search($areaId)
    {
        $area = Area::with('brands')->find($areaId);
        return view('search_area', compact('area'));
    }

    public function brewery_search($breweryId)
    {
        $brewery = Brewery::with('brands')->find($breweryId);
        return view('search_brewery', compact('brewery'));
    }
}
