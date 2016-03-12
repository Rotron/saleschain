<?php

namespace App\Http\Middleware;

use Closure;

class MustBeApproved
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
        $user = $request->user();

        if ($user && $user->approved === 1) {
            return $next($request);
        }
        // return redirect()->back()->with('error', 'Something went wrong.');
        return redirect('/')->withErrors(['Your account is awaiting approval.']);
    }
}
