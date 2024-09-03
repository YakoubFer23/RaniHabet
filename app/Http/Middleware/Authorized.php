<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Authorized
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        $requestedUserId = $request->route('id'); // Assuming the user ID is passed as a route parameter
    
        if ($user->id !== $requestedUserId) {
            return redirect()->back()->with('error', 'Haha! You sneaky hacker');
        }
    
            return $next($request);
        }
    
}
