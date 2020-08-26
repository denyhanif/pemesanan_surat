<?php

namespace App\Http\Middleware;

use Closure;

class WargaAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!auth()->guard('warga')->check()) {
            return redirect(route('warga.login'));
        }
        return $next($request);
    }
}
