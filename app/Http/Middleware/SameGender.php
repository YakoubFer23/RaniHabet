<?php

namespace App\Http\Middleware;

use App\Models\Listing;
use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SameGender
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
    
    if (!$user) {
        return redirect()->route('login')->with('error', 'You must be logged in to apply.');
    }

    $listingId = $request->route('id');
    $listing = Listing::findOrFail($listingId);

    // Ensure 'type' and 'gender' are set properly
    if ($listing->type !== 'Apartment' && $listing->gender !== $user->gender) {
        return redirect()->back()->with('error', 'This is not an apartment; only same-gender applications are allowed.');
    }

    return $next($request);
    }
}
