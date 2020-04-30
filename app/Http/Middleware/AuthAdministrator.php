<?php

namespace App\Http\Middleware;

use Closure;

class AuthAdministrator
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
        $user = $request->user();
        if ($user&&$user->is_admin == 1 )
        {
            return $next($request);
        }
 
        return redirect('/show_smart');//หากไม่ใช่ Admin ให้ Redirect ไปที่ URL นี้
    }
}
