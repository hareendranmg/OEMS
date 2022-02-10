<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class IsCandidate
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
        if (Auth::user()) {
            if (! Auth::user()->is_admin) {
                return $next($request);
            }

            return redirect('admin');
        }

        return redirect('/');
    }
}
