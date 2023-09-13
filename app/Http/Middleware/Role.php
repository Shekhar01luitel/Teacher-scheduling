<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // dd($request->user()->role, $roles);
        // if($request->user()->role !==$role){
        //     return redirect('dashboard');
        // }

        if(!in_array($request->user()->role, $roles)) {
            return redirect('dashboard');

        }
        return $next($request);
    }
}
