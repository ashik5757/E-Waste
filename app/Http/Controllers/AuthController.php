<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    
    // public function signup() {

    // }


    public function store() {


        // dd(request());


        $validated = request()->validate(
            [
                'username' => 'required|min:3|max:9',
                'email' => 'required|email',
                'password' => 'required|confirmed',
            ]
        );


        // dd($validated);


        User::create(
            [
                'name' => request('username'),
                'email' => request('email'),
                'password' => Hash::make(request('password'),),
                'usertype' => 'admin',
            ]
        );





        return redirect()->route('home');


    }


}
