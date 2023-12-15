<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile(string $id){
        return view('profile.profile');
    }
    public function create(string $id){
        return view('profile.profile');
    }
    public function store(string $id){
        return view('profile.profile');
    }
}


