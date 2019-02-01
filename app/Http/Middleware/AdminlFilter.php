<?php

namespace App\Http\Middleware;

use Closure;

class AdminlFilter
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
        $user = auth()->user();
        if($user->adm != 1)
            return redirect('/home')->with('erro', 'Permissão negada!');

        return $next($request);
    }
}
