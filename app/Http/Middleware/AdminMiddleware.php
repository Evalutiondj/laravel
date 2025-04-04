<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    /**
     * Kiểm tra user có phải admin không
     * - Nếu là admin: cho phép truy cập
     * - Nếu không: redirect về trang chủ với thông báo lỗi
     */
    public function handle(Request $request, Closure $next)
    {
        // Check 1: User phải đăng nhập
        // Check 2: User phải có is_admin = true (trong database)
        if (auth()->check() && auth()->user()->is_admin) {
            return $next($request);
        }

        return redirect('/')->with('error', 'Bạn không có quyền truy cập khu vực admin!');
    }
}
