<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;
use App\Models\User;


class ReviewController extends Controller
{
    public function review_store(Request $request) {
        $request->validate([
            'content' => 'required'
        ],
        [
            'content.required' => 'レビュー内容を入力してください'
        ]);

        $review = new Review([
            'user_id' => Auth::id(),
            'brand_id' => $request->brand_id,
            'content' => $request->content,
            'star' => $request->star
        ]);
        $review->save();

        return redirect()->back()->with('success', 'レビューを投稿しました');
    }

    public function review_show(Review $review) {
        return view('review_show', compact('review'));
    }

    public function review_destroy(Review $review) {
        $review->delete();
        $user = Auth::user();
        
        return redirect()->route('user', $user->id)->with('success', 'レビューを削除しました。');
    }
}
