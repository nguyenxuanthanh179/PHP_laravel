<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckLogin
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
        if (Auth::check())
        {
            $user = Auth::user();
            if ($user->is_active == 1 )
            {
                return $next($request);
            } else {
                Auth::logout();
                return redirect()->route('admin.login');
            }
        }

        return redirect()->route('admin.login');
    }
}
