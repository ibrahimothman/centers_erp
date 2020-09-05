<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\Session;

class CenterMiddleware
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
        Session(['center_id' => Auth::user()->center? Auth::user()->center->id : Auth::user()->jobs->first()->center->id]);
        Session(['job_id' => Auth::user()->center? 0: Auth::user()->jobs->first()->id ]);
        return $next($request);
    }
}
