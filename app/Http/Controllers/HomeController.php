<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Listing;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Get the search query (if any)
    $query = $request->input('query');

    // Build the query for listings, filtering only "Online" listings
    $listingsQuery = Listing::where('status', 'Online'); // Only "Online" listings

    if ($query) {
        // Search by city or state
        $listingsQuery->where(function ($subQuery) use ($query) {
            $subQuery->where('city', 'LIKE', '%' . $query . '%')
                     ->orWhere('state', 'LIKE', '%' . $query . '%');
        });
    }

    // Paginate the results
    $listings = $listingsQuery->paginate(6); // Adjust the number of items per page

    // Return the view with the listings
    return view('index', compact('listings'));

    }
}
