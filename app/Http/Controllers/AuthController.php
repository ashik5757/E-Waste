<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\error;

class AuthController extends Controller
{
    
    // public function signup() {

    // }


    public function store(Request $request) {



        // not working without show errors on the field

        // $validatedData  = $request->validate([
        //     'username' => 'required|min:3|max:9',
        //     'email' => 'required|email',
        //     'password' => 'required|confirmed',
        //     'firstname' => 'required|string',
        //     'lastname' => 'required|string',
        //     'number' => 'required|string',
        //     'occupation' => 'nullable|string',
        //     'area' => 'required|string'
        // ]);

        // dd($request);

        $user = User::create(
            [
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                // 'usertype' => 'admin',
            ]
        );


        $profile = Profile::create([
            'user_id' => $user->id,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'number' => $request->number,
            // 'occupation' => 'blah',
            'area' => $request->area
        ]);

        // $profile = Profile::create(
        //     [
        //         'firstname' => request('firstname'),
        //         'lastname' => request('lastname'),
        //         'number' => request('number'),
        //         'area' => request('area'),
        //     ]
        // );

        // $user->profile()->save($profile);



        return redirect()->route('home')->with('success', 'You have successfully created a account');

    }


    public function authenticate(Request $request) {

        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);


        // dd($validated);
 
        if (Auth::attempt($validated)) {
            $request->session()->regenerate();
  
            return redirect()->route('home')->with('success', 'You have successfully logged in your account');

        }
 
        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match our records.',
        // ])->onlyInput('email');

        return redirect()->route('home')->with('error', 'The provided credentials do not match our records');
    }


    
    public function logout(Request $request) {

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home')->with('warning','You have logged out successfully!');;


    }


}
