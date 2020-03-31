<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

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
        if(! Auth::user()->center && count(Auth::user()->jobs) == 0){
            return redirect('settings');
        }

        Session(['center_id' => Auth::user()->center? Auth::user()->center->id : Auth::user()->jobs->first()->center->id]);
        return $next($request);
    }
}
