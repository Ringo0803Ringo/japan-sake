<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Area;
use App\Models\Brewery;
use App\Models\Tag;
use App\Models\Ranking;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $brands = Brand::where('name', 'like', '%'.$keyword.'%')->paginate(20);

        return view('search', [
            'brands' => $brands,
            'keyword' => $keyword ?? '',
        ]);
    }

    public function order(Request $request)
    {
        $sort = $request->input('sort', 'id'); 
    
        switch ($sort) {
            case 'name_asc':
                $brands = Brand::orderBy('name', 'asc')->paginate(20);
                break;
            case 'name_desc':
                $brands = Brand::orderBy('name', 'desc')->paginate(20);
                break;
            default:
                $brands = Brand::orderBy('id')->paginate(20);
                break;
        }

        $areas = Area::all();
        $rankings = Ranking::all();
    
        return view('top', [
            'brands' => $brands,
            'areas' => $areas,
            'rankings' => $rankings
        ]);
    }

    public function search_area(Request $request)
    {
        $area_id = $request->input('area_id');
        $area = Area::with('brands')->find($area_id);
        $areas = Area::all();
        return view('search_area', compact('area', 'areas'));
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

    public function flavor_search($flavorId)
    {
        $tag = Tag::with('brands')->find($flavorId);
        return view('search_flavor', compact('tag'));
    }
}
