<?php

namespace App\Http\Middleware;

use Closure;

class SetLocale
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
        if ($request->get('lang')){
            $language = $request->get('lang');
            session(['lang' => $language]);
        }

        elseif (session('lang')){
            $language = session('lang');
        }

        if (isset($language)) {
            app()->setLocale($language);
        }
        return $next($request);
    }
}
