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
        $sort = $request->input('sort', 'name_asc');
        
        $query = Brand::where('name', 'like', '%'.$keyword.'%')->paginate(20);

        switch ($sort) {
            case 'name_desc':
                $query = Brand::orderBy('name', 'desc');
                break;
            
            case 'name_asc':
            default:
                $query = Brand::orderBy('name', 'asc');
                break;
        }
    
        $brands = $query->paginate(20);
        $brands->appends(['keyword' => $keyword, 'sort' => $sort]);
        $areas = Area::all();
        $rankings = Ranking::all();
        return view('top', [
            'brands' => $brands,
            'keyword' => $keyword ?? '',
            'sort' => $sort,
            'areas' => $areas,
            'rankings' => $rankings
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

    public function flavor_search($flavorId)
    {
        $tag = Tag::with('brands')->find($flavorId);
        return view('search_flavor', compact('tag'));
    }
}
