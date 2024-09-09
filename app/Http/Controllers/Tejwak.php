<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Listing;
use Storage;

class Tejwak extends Controller
{
    public function getIbad(){
        $pendingUsers = User::where("identity_verified",'Pending')->paginate(10);

        return view('tejwak.ibad',compact('pendingUsers'));
    }
    public function validateIbad(Request $request){
        if($request->has('approve')){
            
            $user = User::where('id',$request->approve)->first();
            if($user){
                $user->update(['identity_verified' => 'Verified']);
                Storage::disk('public')->delete($user->identity_verified_picture);
            }else{
                return back()->with('error','User not found');
            }
            return redirect()->back()->with('success','User ID approved');
        }
        if($request->has('deny')){
            
            $user = User::where('id',$request->deny)->first();
            if($user){
                $user->update(['identity_verified' => 'Failed']) ;
                Storage::disk('public')->delete($user->identity_verified_picture);
            }else{
                return back()->with('error','User not found');
            }
            return redirect()->back()->with('success','User ID denied');
        }
        return redirect()->back()->with('error','An error has Occured');
    }
    public function getDiour(){
        $pendingListings = Listing::where("status",'Pending')->paginate(10);

        return view('tejwak.diour',compact('pendingListings'));
    }
    public function validateDiour(Request $request){
        if($request->has('approve')){
            $listing = Listing::where('id', $request->approve)->first();
            if($listing){
                $listing->update(['status'=> 'Online']);
            }else{
                return back()->with('error','Listing not found');
            }
            return redirect()->back()->with('success','Listing approved');
        }
        if($request->has('deny')){
            $listing = Listing::with('listing_images')->findOrFail($request->deny);
            $listing->delete();
            // Delete associated images
            foreach ($listing->listing_images as $image) {
                Storage::disk('public')->delete($image->image_path);
                $image->delete(); // Delete the record from the database
            }
            Storage::disk('public')->delete($listing->thumbnail);
            return redirect()->back()->with('success', 'Property deleted successfully.');
        
        }
        return redirect()->back()->with('error','An error has occured !');
    }
}
