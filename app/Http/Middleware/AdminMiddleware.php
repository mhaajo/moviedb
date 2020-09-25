<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        if (Auth::user()->role->name != 'Ylläpitäjä') {
            Auth::logout();
            return redirect()->route('login')
                ->with('status','Sinut on kirjattu ulos koska yritit avata sivun johon sinulla ei ole käyttöoikeutta.');
        }

        return $next($request);
    }
}
