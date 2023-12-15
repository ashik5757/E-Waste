@extends('layout.app')


@section('title')
    E-Waste | Add Feature
@endsection


@section('more_link')

<link rel="stylesheet" href="{{ asset('assets/css/addblog.css') }}">
@endsection


@section('content')

<div class="main-banner header-text" id="top" style=" background: linear-gradient(to bottom, #dffbf0 30%, #ffffff 93%);">

    <div class="container home-con">
        <div class="half1">
            <h3 style="color: rgb(47,155,92);font-size: 60px;">Add a Feature Post</h3>
            <h3 class="mt-3">Please fill the following details-</h3>
        </div>
    </div>



</div>


<div style="margin-left: 28%;margin-bottom: 28px;margin-top: 28px">
    <!-- Your create blog form goes here -->


                <div class="form-container">

                    <form class="form" action="{{route('blog.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="form-group">
                        <label for="title" class="form-label">Feature Title</label><br>
                        <input class="form-control" required="" name="title" id="title" type="text">
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">Feature Description</label><br>
                        <textarea class="form-control" required="" cols="50" rows="5" id="textarea" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="details" class="form-label">Feature Details</label><br>
                        <textarea class="form-control" required="" cols="50" rows="10" id="textarea" name="details"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="category" class="form-label" >Feature Category</label><br>
                        <select name="category" id="category" class="form-select">
                            <option value="blog">Crafting</option>
                            <option value="product">Recycling</option>
                            <option value="resource">Others</option>
                        </select>
                    </div>

                    <label for="image" class="custum-file-upload" class="form-label"><br>
                        <div class="icon">

                        </div>
                        <div class="text">
                        <label>Click to upload Feature content</label>
                        </div>
                        <input class="form-control" id="image" name="image[]" type="file" accept="image/*" onchange="previewImages(event)" multiple>
                    </label>



                    <div id="image-preview"></div>

                    <br><br>
                    <button type="submit" class="btn btn-xs pl-3 pe-3 " style="background:rgb(47,155,92);color:white">Submit</button>
                    </form>


                </div>


</div>

@endsection
