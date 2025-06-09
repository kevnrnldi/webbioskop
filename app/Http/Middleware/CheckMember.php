<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Log;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckMember
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!$request->has('membership')){
            return redirect('/pricing')->with('error', 'anda harus premium');
        }

        Log::info('before request', [
            'url' => $request->url(),
            'params' => $request->all(),
        ]);

        // Log the request details
        $response = $next($request);
        sleep(2); // Simulate a delay for demonstration purposes


        Log::info('after request', [
            'status' => $response->getStatusCode(),
            'content' => $response->getContent(),
        ]);

         return $response;
    }
}
