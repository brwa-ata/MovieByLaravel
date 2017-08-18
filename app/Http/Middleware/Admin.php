<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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
        // ama jyay akatawa ka aya aw kasa admin bew active be bo away regay pebdre ka bcheta zhwrawa
        if (Auth::check())
        {
            if (Auth::user()->isAdmin())
            {
                return $next($request);
            }
        }

        return redirect('/');
    }
}
