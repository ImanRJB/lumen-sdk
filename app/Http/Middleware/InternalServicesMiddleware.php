<?php

namespace ImanRjb\LumenSdk\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use function App\Http\Middleware\abort;
use function App\Http\Middleware\config;

class InternalServicesMiddleware
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
        $allowedSecret = config('services.secret');
        if ($request->header('Internal-Secret') == $allowedSecret) {
            return $next($request);
        }
        abort(Response::HTTP_UNAUTHORIZED);
    }
}
