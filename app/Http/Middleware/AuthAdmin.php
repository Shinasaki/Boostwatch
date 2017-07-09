<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthAdmin
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
        if (Auth::check()) {

            $permission = Auth::user()->permission;
            if ($permission < 4)
            {
                $url = redirect()->getUrlGenerator()->previous() . "?alert=admin";
                return Redirect::to($url);
            }
        }
        else
        {
            $url = redirect()->getUrlGenerator()->previous() . "?alert=login";
            return Redirect::to($url);
        }

        return $next($request);
    }
}
