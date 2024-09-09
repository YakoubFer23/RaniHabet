<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;

class ListingController extends Controller
{
    public function show($id)
    {
        // Fetch the listing by its ID
        $listing = Listing::findOrFail($id);
        $states = config("states");
        // Pass the listing data to the view
        return view('listings', compact('listing','states'));
    }

    public function create()
    {
        return view('listings-add');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:50',
            'description' => 'required|string|max:2000',
            'price' => 'required|numeric',
            'address' => 'required|string|max:100',
            'city' => 'required|string',
            'state' => 'required|string',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000',
            'type' => 'required|in:Apartment,Private Room,Shared Room',
            'gender' => [
                function ($attribute, $value, $fail) use ($request) {
                    if (in_array($request->type, ['Private Room', 'Shared Room']) && empty($value)) {
                        $fail('The gender field is required for Private Room and Shared Room types.');
                    }
                },
            ],
            'availability' => 'required|date',
            'duration' => 'string|required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:10000', // Validate each uploaded image
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
    
        return redirect()->route('dash.index')->with('success', 'Property is pending approval. You will be notified via email once approved');
    }
    
    public function apply($id, Request $request)
    {
        $user = Auth::user();
        $listingId = $request->route('id');
        
        $listing = Listing::findOrFail($listingId);
        // Check if the user trying to apply is the owner of the listing
      
       
        if ($listing->user_id == $user->id) {
            return redirect()->route('dash.index')->with('error', 'You can\'t apply to your own property');
        }


        // Check if the user has already applied to this listing
        $existingApplication = Application::where('user_id', $user->id)->where('listing_id', $id)->first();


        if ($existingApplication) {
            return redirect()->route('dash.index')->with('error', 'You have already applied to this property.');
        }

        // Create a new application
        Application::create([
            'user_id' => $user->id,
            'listing_id' => $id,
        ]);

        return redirect()->route('dash.index')->with('success', 'You have successfully applied to this property.');
    }

    
}
