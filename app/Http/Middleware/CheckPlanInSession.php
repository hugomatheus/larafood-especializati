<?php

namespace App\Http\Middleware;

use Closure;

class CheckPlanInSession
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
        $plan = session('plan');

        if(!$plan)
        {
            return redirect()->route('site.home');
        }

        return $next($request);
    }
}
