<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;

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
}
