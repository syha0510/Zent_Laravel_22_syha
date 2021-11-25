<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Foreach_;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        foreach($roles as $role)
        {
            // dd(Auth::user()->roles );
            foreach(Auth::user()->roles as $r)
            {
                if( $r->slug == $role )
                {
                    return $next($request);
                }
            }

            // if(Auth::user()->role->name == $role)
            // {
            
            // }
        }
        
            return abort(403);
    }
}
