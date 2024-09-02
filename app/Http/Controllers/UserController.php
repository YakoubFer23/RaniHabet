<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Storage;

class UserController extends Controller
{




    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user)
    {
        
        $validated = request()->validate(
            [
                'phone_number' => 'max:10',
                'about' => 'max:255',
                'profile_picture' => 'image',
            ]
        );

        if(request()->hasFile('profile_picture')) {
            $imagePath = request()->file('profile_picture')->store('profile','public');
            $validated['profile_picture'] = $imagePath;
            Storage::disk('public')->delete($user->profile_picture);
        }

        $user->update($validated);
        return redirect()->route('user.show', $user->id)->with('success', 'Profile updated succesfully');
    }



}
