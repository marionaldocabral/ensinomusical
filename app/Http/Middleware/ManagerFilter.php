<?php

namespace App\Http\Middleware;

use Closure;

class ManagerFilter
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
        if($user->status != 'enc_regional' && $user->status != 'enc_local' && $user->status != 'instrutor' && $user->status != 'auxiliar')
            return redirect('/home/aluno')->with('erro', 'Permissão negada!');

        return $next($request);
    }
}
