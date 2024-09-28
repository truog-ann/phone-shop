<?php

namespace App\Http\Middleware\Customs;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
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
            if ($role == 'admin') {
                return $next($request);
            } else {
                return back()->with('error', "Bạn không có quyển trup cập!");
            }
        } else {
            return redirect(route('home'))->with('error', "Bạn chưa đăng nhập!");

        }
    }
}
