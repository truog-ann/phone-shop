<?php

namespace App\Http\Middleware\Customs;

use App\Http\Controllers\service\Cart;
use Closure;
use Illuminate\Http\Request;

class CheckCart
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
        $cart = new Cart;
        // dd($cart->list());
        if ($cart->list() !== []) {
            return $next($request);
        }
        return redirect(route('home'));

    }
}
