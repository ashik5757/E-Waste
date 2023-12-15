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


    public function details(string $slug) {


        return view('blog.details');


    }
    public function store() {

//     $db= new BLOG();
//     $db->name=request('name');
//     $db->price=request('price');
//     $db->type=request('name');
//     $db->base=request('base');
// //error_log($db);
//    $db -> save();
//     return redirect('/');


    }
    public function create() {


        return view('blog.addblog');


    }
}
