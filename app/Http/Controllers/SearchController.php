<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class SearchController extends Controller
{
    public function search(Request $request)
{
    $keyword = $request->input('keyword');
    $brands = Brand::where('name', 'like', '%'.$keyword.'%')->get();
    return view('top', [
        'brands' => $brands,
        'keyword' => $keyword ?? ''
    ]);
}
}
