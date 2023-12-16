@extends('layout.app')


@section('title')
    E-Waste | Community
@endsection


@section('more_link')
    <link rel="stylesheet" href="{{ asset('assets/css/forum.css') }}">
    
@endsection


@section('content')


<div class="main-banner header-text" id="top" style=" background: linear-gradient(to bottom, #dffbf0 30%, #ffffff 93%);">

    <div class="container home-con">
        <div class="half1">
            <h3 style="color: rgb(47,155,92);font-size: 60px;">Comminty Forum</h3>
            <span class="txt mt-3">Exploring the World Through Words</span>
            <h3 class="mt-3">You can Blog post on you own!!</h3>

            <a href="{{route('community.create_thread', ['user'=>Auth::User()->username])}}">
                <input style="margin-top: 100px" type="button" value="Create Thread" class="button_uv1">
            </a>
        </div>
    </div>



</div>

















@endsection


