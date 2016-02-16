<?php
namespace Otman\Http\Middleware;

use Auth;
use Closure;

class VerifyAdmin
{
    public function handle($request, Closure $next)
    {
        if (strcasecmp(Auth::User()->role, 'admin') == 0) {
            return $next($request);
        }

        return redirect('/dashboard')->with('fail', 'You do not have permission.');
    }
}