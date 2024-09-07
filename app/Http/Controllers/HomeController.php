<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Listing;

class HomeController extends Controller
{
    
    public function index(Request $request)
    {
    // Get the search query and type filter
    $query = $request->input('query');
    $type = $request->input('type');

    $states = config('states');
    

    // Start building the query for listings
    $listingsQuery = Listing::query()->where('status', 'Online'); // Only show online listings

    // Apply search filtering (search by city or state)
    if ($query) {
        $listingsQuery->where(function ($subQuery) use ($query) {
            $subQuery->where('city', 'LIKE', '%' . $query . '%')
                     ->orWhere('state', 'LIKE', '%' . $query . '%');
        });
    }

    // Apply type filtering (filter by Apartments, Private Room, or Shared Room)
    if ($type == 'Apartments') {
        $listingsQuery->where('type', 'Apartment');
    } elseif ($type == 'Rooms') {
        // When type is 'Rooms', include both Private Room and Shared Room
        $listingsQuery->whereIn('type', ['Private Room', 'Shared Room']);
    }

    // Paginate the results and preserve query parameters
    $listings = $listingsQuery->latest()->paginate(6)->appends($request->all());

    // Return the view with listings
    return view('index', compact('listings', 'states'));
    }
    
}