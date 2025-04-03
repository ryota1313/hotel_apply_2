<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    // ログインフォームを表示
    public function showLoginForm()
    {
        return view('admin.login');
    }

    // ログイン処理を実行
    public function login(Request $request)
    {
        // 入力をバリデーション
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // adminガードで認証を試みる
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.index');  // ログイン後のページへ遷移
        }

        return back()->withErrors(['email' => 'ログインに失敗しました。'])->withInput();
    }

    // ログアウト処理
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
