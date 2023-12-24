@extends('layout.app')


@section('title')
    E-Waste | Community Forum
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
            <h3 class="mt-3">You can ask your questions here</h3>

            <a href="{{route('community.create', ['user'=>Auth::User()->username])}}">
                <input style="margin-top: 100px" type="button" value="Create Thread" class="button_uv1">
            </a>
        </div>
    </div>

</div>

<div class="container" >
    <div class="row justify-content-evenly"  >



                @foreach ($threads as $thread)

                    <div class="col" style="margin-bottom: 70px">

                        <div class="card" style="width: 1100px;background:#eee;">
                            <a style="width: 800px;" href="{{route('thread.details', ['id'=>$thread->id])}}" >

                                <div class="row align-items-start">
                                    
                                    <div class="col-md-8">
                                        <div class="card-body">
                                        <p class="card-text">{{$thread->question}}</p>
                                        
                                        <p class="card-text"><small class="text-body-secondary">Last Updated {{ $thread->updated_at->diffInMinutes(now()) }} mins ago</small></p>
                                        </div>
                                    </div>
                                </div>

                            </a>
                        </div>
                    </div>
                @endforeach

        </div>
    </div>
</div>



@endsection


