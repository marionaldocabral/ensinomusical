<?php

namespace App\Http\Middleware;

use Closure;

class RegionalFilter
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
    
        if($user->status == 'iniciante' || $user->status == 'ensaio' || $user->status == 'rjm' || $user->status == 'oficial' || $user->status == 'oficializado')
            return redirect('/home/aluno')->with('erro', 'Permissão negada!');
        if($user->status == 'auxiliar' || $user->status == 'enc_local' || $user->status == 'instrutor')
            return redirect('/home')->with('erro', 'Permissão negada!');

        return $next($request);
    }
}
