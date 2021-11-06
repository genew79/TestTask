<?php

namespace App\Http\Middleware;

use App\Services\JsonRpcClient;
use Illuminate\Http\Request;

class SendStat
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, \Closure $next)
    {
        return $next($request);
    }

    public function terminate($request, $response)
    {
        $client = new JsonRpcClient();
        $client->send('stat@save', [
            'url' => $request->url(),
            'dt' => date('Y-m-d H:i:s')
        ]);
    }
}
