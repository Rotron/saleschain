<?php

namespace App\Http\Middleware;

use Closure;

class MustBeAdmin
{
    /**
     * Handle an incoming request.
     * If user isAdmin, allow 
     * else, display 404 ;)
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = $request->user();

        if ($user && $user->isAdmin === 1) {
            return $next($request);
        }

        abort(404);
        // return redirect('/')->withErrors(['Your account is awaiting approval.']);
    }
}
