<?php

namespace App\Http\Middleware\Customs;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $role = Auth::user()->roles->role;
            if ($role !== 'user') {
                return $next($request);
            } else {
                return redirect(route('home'))->with('error', "Bạn không có quyển trup cập!");
            }
        } else {
            return redirect(route('home'))->with('error', "Bạn chưa đăng nhập!");

        }
    }
}
