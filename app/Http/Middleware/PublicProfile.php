<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use App\Models\Listing;
use App\Models\Application;

class PublicProfile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $profileId = $request->route('id'); // Profile owner's ID
        $user = Auth::user(); // Currently authenticated user

        if ($user->id === $profileId) {
            return $next($request);
        }

        // Check if the current user has applied to any of the profile owner's listings
        $profileOwnerListings = Listing::where('user_id', $profileId)->pluck('id');
        $userHasApplied = Application::whereIn('listing_id', $profileOwnerListings)
                                     ->where('user_id', $user->id)
                                     ->exists();

        // Check if the profile owner has applied to any of the current user's listings
        $userListings = Listing::where('user_id', $user->id)->pluck('id');
        $profileOwnerHasApplied = Application::whereIn('listing_id', $userListings)
                                             ->where('user_id', $profileId)
                                             ->exists();

        if ($userHasApplied || $profileOwnerHasApplied) {
            return $next($request); // Allow access if either condition is true
        }

        // Deny access if none of the conditions are met
        return redirect()->route('dash.index')->with('error','Profile cannot be viewed, User have not applied to your property nor has a property that you applied to. ');

    }
}
