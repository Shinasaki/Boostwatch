<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthMember
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
            if ($permission < 2)
            {

                $url = redirect()->getUrlGenerator()->previous() . "?alert=member";
                return Redirect::to($url);
            }
        }
        else
        {
            return redirect('/login?alert=login');
        }

        return $next($request);
    }
}
