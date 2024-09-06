<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Listing;

class PendingListing
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $listingId = $request->route('id');
        $listing = Listing::findOrFail($listingId);
        if ($listing->status == 'Pending') {
            if (Auth::user()->id !== $listing->user_id) {
                return redirect()->route('dash.index')->with('error', 'The property you are trying to view is pending approval');
            }else if (Auth::user()->id == $listing->user_id) {
                session()->flash('warning','Your property is being reviewed, it will be available once approved');
                return $next($request);
            }
        }
        return $next($request);
    }
}
