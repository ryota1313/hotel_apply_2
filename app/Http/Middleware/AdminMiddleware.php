<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // 管理者ログインしているかチェック
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login')->withErrors('管理者としてログインしてください。');
        }

        return $next($request);
    }
}

