<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SayHello
{

    public function handle(Request $request, Closure $next): Response
    {
        if($request->query("greeting") !== "hello"){
            return response('You did not say hello', 401); 
        }

        return $next($request);
    }
}
