<?php
declare(strict_types=1);

namespace App\Http\Middleware;

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

final class NoCache
{
    /**
     * @param Request $request
     * @param Closure(Request): (Response|RedirectResponse) $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next): Response|RedirectResponse
    {
        $response = $next($request);
        $response->withHeaders([
            'Cache-Control' => 'no-store',
            'Max-Age' => 0,
        ]);

        return $response;
    }
}
