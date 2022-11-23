<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LevelAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$level)
    {
        if (!collect($level)->contains(auth()->user()->level)) {
            return abort(403);
        }
        return $next($request);
    }
}
