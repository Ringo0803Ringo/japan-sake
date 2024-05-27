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

        $photos = Photo::where('brand_id', $brand->id)->get(); // 特定のbrand_idに紐づく写真のみを取得
    

        return view('brand.show', compact('brand', 'reviews', 'photos'));
    }

    public function recommend($id) {
        // ブランドIDが312の画像を取得
        $brand = Brand::findOrFail($id);
        $photos = Photo::where('brand_id', 312)->get(); // 固定のブランドID 312の画像を取得
    
        return view('top', compact('brand', 'photos'));
    }

}