<?php

namespace App\Http\Middleware;

use Closure;


class UserFilter
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
        if($user->status == 'enc_regional')
            return redirect('/home/regional')->with('erro', 'Permissão negada!');
        if($user->status != 'iniciante' && $user->status != 'ensaio' && $user->status != 'rjm' && $user->status != 'oficial' && $user->status != 'oficializado')
            return redirect('/home')->with('erro', 'Permissão negada!');
        
        return $next($request);
    }
}
