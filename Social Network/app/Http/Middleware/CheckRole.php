<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ... $roles): Response
    {
        foreach($roles as $role) {
            $role_Id = Role::where('name', $role)->first()->id;
            if (auth()->user()?->role_id == $role_Id) {
                return $next($request);
            }
        }
        abort(401,'unauthorized access');


    }
}
