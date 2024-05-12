<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Photo;

class BrandController extends Controller
{
    public function show(Brand $brand) {

        //foreachでタグのフレーバーを取得する。

        $reviews = $brand->reviews()->get();

        $photos = Photo::all();

        return view('brand.show', compact('brand', 'reviews', 'photos'));
    }


}