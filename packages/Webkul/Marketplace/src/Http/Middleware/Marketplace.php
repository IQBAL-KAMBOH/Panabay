<?php

namespace Webkul\Marketplace\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Marketplace
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        abort_if(! core()->getConfigData('marketplace.settings.general.status'), 404);

        return $next($request);
    }
}
