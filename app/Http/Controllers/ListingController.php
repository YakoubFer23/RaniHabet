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

    public function create()
    {
        return view('listings-add');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric',
            'address' => 'required|string|max:255',
            'city' => 'required|string',
            'state' => 'required|string',
            'thumbnail' => 'required|image',
            'type' => 'required|string|required',
            'gender' => 'string',
            'availability' => 'required|date',
            'duration' => 'string|required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate each uploaded image
        ]);

        $listing = new Listing();
        $listing->title = $request->title;
        $listing->description = $request->description;
        $listing->price = $request->price;
        $listing->address = $request->address;
        $listing->type = $request->type;
        $listing->duration = $request->duration;
        $listing->city = $request->city;
        $listing->state = $request->state;
        $listing->availability = $request->availability;
        $listing->gender = $request->gender;
        if (request()->hasFile('thumbnail')) {
            $imagePath = request()->file('thumbnail')->store('listings', 'public');
            $listing->thumbnail = $imagePath;
        }
        $listing->user_id = auth()->id();
        $listing->save();


        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('listings', 'public'); // Store image in the storage
                $listing->listing_images()->create(['image_path' => $path]);
            }
        }

        return redirect()->route('listings.add')->with('success', 'Listing created successfully.');
    }
}
