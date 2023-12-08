<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check())
        // admin role==1
         //user role== 0
        {
            if(Auth::user()->role=='1'){  
                return $next($request);

            } 
            else
            {
                return redirect('/login')->with('message','You are not Admin');

            }

        }
        else
        {
            return redirect('/login')->with('message','Login');

        }
        return $next($request);
    }
}
