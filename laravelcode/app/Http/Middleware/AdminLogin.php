<?php

namespace App\Http\Middleware;

use Closure;

class AdminLogin
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
        session(['user'=>null]);
        if(!session('user')){
            return redirect('admin/login');         //跳转到admin.login中
        }
        return $next($request);
    }
}
