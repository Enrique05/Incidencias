<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
class CheckRole
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
       

        if($request->user()->role_id != 1){//clientes
            
            return redirect('clientes'); 
        }
        return $next($request);

              
    }
}
