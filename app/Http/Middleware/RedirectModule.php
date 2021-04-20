<?php

namespace App\Http\Middleware;

use Closure;
use App\Redirect;
use Illuminate\Support\Facades\Auth;

class RedirectModule
{
     /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $redirect = Redirect::where('url_from', '/'.$request->path())->where('status',1)->first();

        if($redirect){
            return redirect($redirect->url_to);
        }else{
            return $next($request);
        }
    }
}
