<?php namespace Bantenprov\APKasar\Http\Middleware;

use Closure;

/**
 * The APKasarMiddleware class.
 *
 * @package Bantenprov\APKasar
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class APKasarMiddleware
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
        return $next($request);
    }
}
