<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeatureController extends Controller
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

    }
}
