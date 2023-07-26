<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if(Auth::user()->role=="admin") return redirect(RouteServiceProvider::HOME_ADMIN);
                // Perform your logic here
                $value = 'Not Have Permision To Access Page';

                return redirect(RouteServiceProvider::PAGE_ERROR_PERMISION)->with("value",$value);
            }
        }

        return $next($request);
    }
}
