<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$roles): Response
    {
        if($request->user()->role==$roles)
        $user=Auth::user();
        $expiretimes=session("expiredtime");
        $currentTime = Carbon::now();
        if ($currentTime->gt($expiretimes)) {
            $user=Auth::user();
            $token=$user->createToken("myApp")->accessToken;
            session(["expiredtime"=>Carbon::now()->addMinutes(10),"token"=> $token]);
        }
        return $next($request);
        // Perform your logic here
        $value = 'Not Have Permision To Access Page';
        return redirect("error_500")->with("value",$value);
    }
}
