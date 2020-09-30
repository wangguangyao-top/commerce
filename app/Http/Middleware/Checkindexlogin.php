<?php

namespace App\Http\Middleware;

use Closure;

class Checkindexlogin
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
        $user = session('user');
        if (empty($user)) {
            return redirect('/index/login');
        }
        return $next($request);
    }
}
