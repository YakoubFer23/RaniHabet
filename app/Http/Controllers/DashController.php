<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Application;
use App\Models\Listing;
use Storage;

class DashController extends Controller
{
    public function show(){
        $user = Auth::user();

        // Listings created by the user
        $userListings = $user->listings()->with('applications.user')->get();

        // Listings the user has applied to
        $appliedListings = Application::with('listing')->where('user_id', $user->id)->get();
        
        return view('dash', compact('userListings', 'appliedListings'));
    }

    public function destroyListing($id)
    {
        $listing = Listing::with('listing_images')->findOrFail($id);

        if ($listing->user_id == Auth::id()) {

            $listing->delete();
            // Delete associated images
            foreach ($listing->listing_images as $image) {
                Storage::disk('public')->delete($image->image_path);
               // Storage::delete($image->image_path); // Delete the file from storage
                $image->delete(); // Delete the record from the database
            }
            Storage::disk('public')->delete($listing->thumbnail);
            return redirect()->back()->with('success', 'Listing deleted successfully.');
        }

        return redirect()->back()->with('error', 'Unauthorized action.');
    }

    public function destroyApplication($id)
    {
        $application = Application::findOrFail($id);

        if ($application->user_id == Auth::id()) {
            $application->delete();
            return redirect()->back()->with('success', 'Application deleted successfully.');
        }

        return redirect()->back()->with('error', 'Unauthorized action.');
    }

}
