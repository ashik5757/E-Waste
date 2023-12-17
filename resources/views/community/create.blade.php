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
            <h3 class="mt-3">You can Blog post on your own!!</h3>
        </div>
    </div>



</div>

<div style="margin-left: 28%;margin-bottom: 28px;margin-top: 28px">
    <!-- Your create forum form goes here -->

                <div class="form-container">

                    <form id="submitForm_forum" action="{{route('forum.store', ['user'=>Auth::User()->username])}}" method="post" enctype="multipart/form-data"
                        class="needs-validation-l" novalidate>
                        @csrf
                    <div class="form-group">
                        <label for="description" class="form-label">Enter your queries</label><br>
                        <textarea class="form-control" cols="50" rows="5" id="textarea" name="description" required></textarea>
                        <div class="invalid-feedback">
                            This field is required.
                        </div>
                    </div>
                    
                    <label for="image" class="custum-file-upload" class="form-label"><br>
                        <div class="icon">

                        </div>
                        <div class="text">
                        <label>Click to upload image</label>
                        </div>
                        <input class="form-control" id="image" name="images[]" type="file" accept="image/*" onchange="previewImages(event)" multiple required>
                    </label>



                    <div id="image-preview"></div>

                    <br><br>
                        <button type="submit" class="btn btn-xs pl-3 pe-3" style="background:rgb(47,155,92);color:white">Post</button>
                    </form>


                </div>


</div>



@endsection


