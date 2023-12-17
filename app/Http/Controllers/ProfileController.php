<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile($user){

        $user = Auth::user();
        $profile = $user->profile;

        return view('profile.profile', compact('user','profile'));
    }

    public function update(Request $request){

        // dd($request);

        $profile = Auth::user()->profile;
        
        $profile->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'number' => $request->number,
            'occupation' => $request->occupation,
            'area' => $request->area,
        ]);






        return redirect()->route('home')->with('success', 'Profile have updated');
    }


}


