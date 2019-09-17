<?php

namespace App\Http\Middleware;

use Closure;

class GrantAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $accessNeeded = null)
    {
        if (auth()->user()->hasAccess($accessNeeded)) {
            return $next($request);
        }
        //else redirect to home
        else return redirect('/home');
    }
}
