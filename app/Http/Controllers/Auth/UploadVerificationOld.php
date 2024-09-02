$data = $request->validated();
        $userId = auth()->id();
        $user = User::findOrFail($userId);
        $user->identity_verified = 'pending';
        
        
        if($request->hasFile('id_verification')){
            $file = $request->file('id_verification');
            $filename = 'assets/idVerification/' . Auth::user()->firstname . '-' . Auth::user()->lastname . time() . '.' . $file->getClientOriginalExtension();
            $file->move('assets/idVerification', $filename);
            $user->identity_verified_picture = $filename;
        }
        $user->save();

        return redirect('/');