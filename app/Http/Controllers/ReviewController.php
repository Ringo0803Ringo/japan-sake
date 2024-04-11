<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;
use App\Models\User;


class ReviewController extends Controller
{
    public function review_store(Request $request)
    {
        $user = User::find(Auth::id());

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

        return redirect()->back()->with('success', 'レビューを投稿しました。');
    }
}
