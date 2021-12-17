<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsApproved
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->check() && auth()->user()->is_approved == 'Approved'){
            return $next($request);
        }
        $response = [
            'status' => false,
            'message' => 'Your profile is not approved yet'
        ];
        return response()->json($response);
    }
}
