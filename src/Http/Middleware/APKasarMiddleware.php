<?php namespace Bantenprov\PdrbHargaDasar\Http\Middleware;

use Closure;

/**
 * The PdrbHargaDasarMiddleware class.
 *
 * @package Bantenprov\PdrbHargaDasar
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class PdrbHargaDasarMiddleware
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
