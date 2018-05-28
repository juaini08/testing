<?php
 
namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
 
class PermissionClearanceMiddleware
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
        if (Auth::user()->hasRole('Admin')) 
        {
            return $next($request);
        }
        if (Auth::user()->hasRole('User')) 
        {
            if ($request->is('posts/create'))
            {
                if (!Auth::user()->hasPermissionTo('Add Post'))
                {
                   abort('401');
                } 
                else {
                   return $next($request);
                }
            }
            if ($request->is('posts'))
            {
                if (!Auth::user()->hasPermissionTo('View Post'))
                {
                   abort('401');
                } 
                else {
                   return $next($request);
                }
            }
        }
        return $next($request);
    }
}