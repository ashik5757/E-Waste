<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    

    public function blogsite() {

        // if(Auth::check()){
        //     return view('blog.blogsite');
        // }

        // else {
        //     return redirect()->route('home')->with('error', 'Please login to your account');
        // }

        return view('blog.blogsite');

        
    }
}
