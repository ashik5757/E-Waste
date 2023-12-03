@extends('layout.app')


@section('title')
    E-Waste | #{{Auth::User()->username}}
@endsection


@section('more_link')
    
@endsection


@section('content')


<div class="main-banner header-text" id="top" style=" background: linear-gradient(to bottom, #dffbf0 30%, #ffffff 93%);">

    <div class="container home-con">
        <div class="half1">
            <h3 class="mt-5" style="color: rgb(65, 255, 144);font-size: 60px;">Profile Page</h3>
            <h1 class="mt-5"> <br><span class="txt"></span></h1>
                <p class="mt-4">  
                    
                    
                </p>
            <input type="button" value="Discover Now" class="button_uv1">
        </div>


    </div>



</div>


@endsection
    

