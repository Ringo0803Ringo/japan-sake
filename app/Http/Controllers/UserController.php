<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function user(User $user) {
        return view('user', compact('user'));
    }

    public function user_edit(User $user) {
        return view('user_edit', compact('user'));
    }

    public function user_update(Request $request, User $user) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ],
        [
            'name.required' => '名前を入力してください',
            'email.required' => 'メールアドレスを入力してください',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect()->route('top')->with('success', 'ユーザー情報を変更しました');
    }
}
