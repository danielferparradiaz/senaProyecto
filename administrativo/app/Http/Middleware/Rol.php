<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use app\Models\User;

class Rol
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
       $rol = User::where('rol_id', '1')->find();
        if($rol){
        return $next($request);
        }
    }
}
