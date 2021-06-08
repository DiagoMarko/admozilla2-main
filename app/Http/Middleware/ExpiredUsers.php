<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth; 

class ExpiredUsers
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $users = Auth::user();
        if ($users->expire == 0) {
            Auth::logout();
            return redirect('/admin-register');
        }
        return $next($request);
    }
}
