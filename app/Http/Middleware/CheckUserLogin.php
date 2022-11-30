<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        if(!Auth::check())
        {
            if($request->ajax()) {
                return response()->json([
                    'error' => true
                ]);
            }
            return redirect()->route('get.login')->with('needLogin','Cần đăng nhập');
        }
        return $next($request);
    }
}
