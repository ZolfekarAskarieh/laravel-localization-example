<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;

class Language
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
        $lang = isset($request['lang']) ? $request['lang'] : App::getLocale();

        App::setLocale($lang);

        View::share('lang', $lang);

        return $next($request);
    }
}
