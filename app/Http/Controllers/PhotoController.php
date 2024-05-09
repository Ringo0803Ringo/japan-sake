<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;

class PhotoController extends Controller
{
    public function create() {
        
        return view('brand.show');
    }

    public function photo_store(Request $request) {
        $request->validate([
            'photo' => 'required'
        ],
        [
            'photo.require' => '写真を追加してください'
        ],
        [
            'image' => 'required|image|max:2048', // 2MBまで
        ]); 

        $path = $request->file('image')->store('images', 'public');

        $photo = new Photo;
        $photo->filmname = $path;
        $photo->save();

        return redirect()->back()->with('success', '画像がアップロードされました。');
    }
}
