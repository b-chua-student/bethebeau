<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Auth;

class EnsureNotGuest
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->email === 'guest@guest') {
            return redirect()->route('app.homepage')->withErrors(['error' => 'Guests cannot access this page.']);
        }
        return $next($request);
    }
}
