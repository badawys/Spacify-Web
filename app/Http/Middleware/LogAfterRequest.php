<?php
namespace app\Http\Middleware;

use Closure;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\TerminableInterface;
use Illuminate\Support\Facades\Log;

class LogAfterRequest implements TerminableInterface {

    public function handle($request, Closure $next)
    {
        return $next($request);
    }

    /**
     * Terminates a request/response cycle.
     *
     * Should be called after sending the response and before shutting down the kernel.
     *
     * @param Request $request A Request instance
     * @param Response $response A Response instance
     */
    public function terminate(Request $request, Response $response)
    {
        Log::info('app.requests', ['request' => $request->all(), 'response' => $response->getContent()]);
    }
}