<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class SearchController extends Controller
{
    public function search(Request $request)
{
    $keyword = $request->input('keyword');
    $brands = Brand::where('name', 'like', '%'.$keyword.'%')->paginate(100);
    return view('top', [
        'brands' => $brands,
        'keyword' => $keyword ?? ''
    ]);
}
}
