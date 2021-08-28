<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {

            if (Auth::guard($guard)->check()) {
                // return redirect(RouteServiceProvider::HOME);

                if($guard === 'admin'){
                    return redirect()->route('admin.home');
                }elseif($guard === 'editor'){
                    return redirect()->route('editor.home');
                }else{
                    return redirect()->route('user.home');
                }

            }
        }

        return $next($request);
    }
}
