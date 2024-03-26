<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class BrandController extends Controller
{
    public function show(Brand $brand) {

        //foreachでタグのフレーバーを取得する。

        return view('brand.show', compact('brand'));
    }


}