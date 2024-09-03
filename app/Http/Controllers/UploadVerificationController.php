<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\IdVerificationFormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UploadVerificationController extends Controller
{
    public function storeVerification()
    {
        $user = Auth::user();
        
        $validated = request()->validate(
            [ 
                'identity_verified_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000',
            ]
        );
        if (request()->hasFile('identity_verified_picture')) {
            $imagePath = request()->file('identity_verified_picture')->store('IdentityVerification', 'public');
            $validated['identity_verified_picture'] = $imagePath;
            $user->identity_verified = 'pending';
        }
        $user->update($validated);

        return redirect()->route('home')->with('pending','Congrats');
    }

}

