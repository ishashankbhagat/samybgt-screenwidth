<?php

namespace Samybgt\Screenwidth\app\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ScreenWidth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (\Session::has('screenWidth')) {
            return $next($request);
        }

        $intend = url()->full();
        $route = route('getScreenWidth');

        $request->session()->put('screenWidthIntend', $intend);

        return redirect($route);
    }
}
