<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeatureController extends Controller
{
    public function resources() {
        return view('resource.resources');
    }
    public function create() {
        return view('resource.addfeature');
    }
    public function store() {

//     $db= new feature();
//     $db->name=request('name');
//     $db->price=request('price');
//     $db->type=request('name');
//     $db->base=request('base');
// //error_log($db);
//    $db -> save();
//     return redirect('/');

    }
}
