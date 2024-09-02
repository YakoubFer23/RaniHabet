<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;

class ListingController extends Controller
{
    public function show($id)
    {
        // Fetch the listing by its ID
        $listing = Listing::findOrFail($id);

        // Pass the listing data to the view
        return view('listings', compact('listing'));
    }
}
