<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!($request->session()->has("onlineClient"))){
            $uniqid = uniqid();
            if(!($request->session()->has("uniqid"))){
                $request->session()->put("uniqid",$uniqid);
            }
            return $next($request);
        }else{
            return $next($request);
        }
    }
}
