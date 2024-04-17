<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;
use App\Models\Brand;

class FavoriteController extends Controller
{
    public function favorite(Request $request) {
        $favorite = new Favorite([
            'user_id' => Auth::id(),
            'brand_id' => $request->brand_id
        ]);
        $favorite->save();

        return back()->with('success', 'お気に入り登録しました');
    }

    public function favorite_destroy(Request $request, Brand $brand) {
        $brand = Brand::find($request->brand_id);
        $brand->favorites()->where('user_id', Auth::user()->id)->delete();

        return back()->with('success', 'お気に入り解除しました');
    }
}
