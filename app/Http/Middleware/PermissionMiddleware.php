<?php

namespace App\Http\Middleware;

use Closure;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next  ,   $permission)
    {



        if (!$request->user()->userHasPermission($permission))
        {
            abort(403  ,'You are not authorized');
        }


        return $next($request);

    }
}
