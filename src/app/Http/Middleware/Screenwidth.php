<?php

namespace Samybgt\Screenwidth\app\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Cookie;

use Jaybizzle\CrawlerDetect\CrawlerDetect;


class ScreenWidth
{
  /**
  * Handle an incoming request.
  *
  * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
  */
  public function handle(Request $request, Closure $next): Response
  {

    $CrawlerDetect = new CrawlerDetect;
    if($CrawlerDetect->isCrawler() == true) {
        return $next($request);
    }

    $exceptPathArray = config('samybgt.screenwidth.exceptUrls');
    if (in_array($request->getPathInfo(),$exceptPathArray)) 
    {
        return $next($request);
    }
    
    if (Cookie::get('screenwidth')) {
      return $next($request);
    }

    $intend = url()->full();
    $route = route('getScreenWidth');

    Cookie::queue(Cookie::make('screenWidthIntend', $intend, 1440));

    return redirect($route);
  }
}
