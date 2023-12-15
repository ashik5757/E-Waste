<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function feature() {
        return view('feature.feature');
    }
    public function create() {
        return view('feature.addfeature');
    }
    public function details() {
        return view('feature.details');
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
