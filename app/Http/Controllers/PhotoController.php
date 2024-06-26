<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Photo;
use App\Models\Brand;

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

        // 画像をBase64エンコード
        $image = base64_encode(file_get_contents($request->image->getRealPath()));

        $photo = new Photo([
            'user_id' => Auth::id(),
            'brand_id' => $request->brand_id,
            'filename' => $image
        ]);
        $photo->save();

        return redirect()->back()->with('success', '画像がアップロードされました。');
    }

    public function photo_up(Brand $brand) {
        $photos = Photo::where('brand_id', $brand->id)->get(); // 特定のbrand_idに紐づく写真のみを取得
        return view('brand.show', compact('photos'));
    }

    public function photo_show(Photo $photo) {
        return view('photo_show', compact('photo'));
    }

    public function photo_destroy(Photo $photo) {
        $photo->delete();
        $user = Auth::user();
        
        return redirect()->route('user', $user->id)->with('success', '画像を削除しました。');
    }
}
