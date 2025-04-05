<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->role != 'admin') {
            return redirect('/'); // Nếu không phải admin, chuyển hướng về trang chủ
        }
        return $next($request);
    }
}
