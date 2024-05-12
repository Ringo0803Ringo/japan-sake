<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Photo;

class PhotoController extends Controller
{
    public function create() {
        
        return view('brand.show');
    }

    public function photo_store(Request $request) {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // ファイルタイプを指定 // 2MBまで
        ], [
            'image.required' => '写真を追加してください'
        ]);

        $path = $request->file('image')->store('public/image');

        $photo = new Photo([
            'user_id' => Auth::id(),
            'brand_id' => $request->brand_id,
            'filename' => $path
        ]);
        $photo->save();

        return redirect()->back()->with('success', '画像がアップロードされました。');
    }

    public function photo_show() {
        $photos = Photo::all();
        return view('brand.show', compact('photos'));
    }
}
