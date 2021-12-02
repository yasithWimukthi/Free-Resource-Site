<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // if (Auth::guard('api')->check() && $request->user()->type >= 1) {
        //     return $next($request);
        // } else {
        //     $message = ["message" => "Permission Denied"];
        //     return response($message, 401);
        // }

        $user = Auth::user();
        if(optional(Auth::user())->type == 1){
            //return $next($request);
            return redirect()->intended('/admin');
        }else{
            $message = ["message" => "Permission Denied"];
            return response($message, 401);
        }
    }
}
