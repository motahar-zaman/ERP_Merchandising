<?php

namespace App\Http\Middleware;

use Closure;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param $per
     * @return mixed
     */
    public function handle($request, Closure $next, $per)
    {
//        dd($request->user());
        $roles = $request->user()->roles;
        foreach($roles as $role){
            foreach($role->permissions as $permission){
                if($permission->name === $per){
                    return $next($request);
                }
            }
        }

        abort(403);
    }
}
