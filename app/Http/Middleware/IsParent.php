<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Redirect;

class IsParent
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $authUser = Auth::user();

        if(!$authUser || (!$authUser->is_parent && $authUser->role != 1)){                    
            return Redirect::to('/');            
        }
        
        $response = $next($request);

        return $response;
    }
}
