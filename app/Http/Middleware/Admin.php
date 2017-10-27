<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
Use Session;
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
        if(!Auth::user()->admin)
            {
                Session::flash('info', 'You do not have permission to make this change - please contact admin.');
                return redirect()->back();
            }

        return $next($request);
    }
}
