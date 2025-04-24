<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ClientMiddleware
{

    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::check()){
            // dd('Bạn chưa đăng nhập');
            return redirect()->back()->with('needLogin', true);
        }
        // dd('Middleware đang chạy!', Auth::check()); // Kiểm tra xem có chạy không

        return $next($request);
    }
}
