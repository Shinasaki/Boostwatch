<?php

namespace App\Http\Middleware;

use Closure;
use Cookie;
use App;

class LangMiddleware
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
        // get locale form cookie or ip
        if(!Cookie::get('Locale'))
        {
            $language = explode(',',$request->server('HTTP_ACCEPT_LANGUAGE'));
            $language = $language[0];
        }
        else
        {
            $language = Cookie::get('Locale');
        }


        // set locale
        if(!empty($language))
        {
            if($language == 'th-TH' || $language == 'th')
            {
                App::setLocale('th');
                Cookie::queue('Locale', 'th', '720');
            }
            else
            {
                App::setLocale('en');
                Cookie::queue('Locale', 'en', '720');
            }
        }
        else
        {
            App::setLocale('en');
            Cookie::queue('Locale', 'en', '720');
        }

        return $next($request);
    }

}
