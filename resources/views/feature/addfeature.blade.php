@extends('layout.app')


@section('title')
    E-Waste | Add Feature
@endsection


@section('more_link')

<link rel="stylesheet" href="{{ asset('assets/css/addfeature.css') }}">
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


    <div class="form-container">

        <form id="submitForm_features" action="{{route('feature.store', ['user'=>Auth::User()->id])}}" method="post" enctype="multipart/form-data" 
            class="needs-validation-l" novalidate>
            @csrf
            <div class="form-group">
                <label for="title" class="form-label">Feature Title</label><br>
                <input class="form-control" required="" name="title" id="title" type="text" required>
                <div class="invalid-feedback">
                    This field is required.
                </div>
            </div>
            <div class="form-group">
                <label for="description" class="form-label">Feature Description</label><br>
                <textarea class="form-control" required="" cols="50" rows="5" id="textarea" name="description" required></textarea>
                <div class="invalid-feedback">
                    This field is required.
                </div>
            </div>
            <div class="form-group">
                <label for="details" class="form-label">Feature Details</label><br>
                <textarea class="form-control" required="" cols="50" rows="10" id="textarea" name="details" required></textarea>
                <div class="invalid-feedback">
                    This field is required.
                </div>
            </div>

            <div class="form-group">
                <label for="category" class="form-label" >Feature Category</label><br>
                <select name="category" id="category" class="form-select" required>
                    <option value="Crafting">Crafting</option>
                    <option value="Recycling">Recycling</option>
                    <option value="Others">Others</option>
                </select>
                <div class="invalid-feedback">
                    This field is required.
                </div>
            </div>

            

            <label for="video" class="custom-file-upload" class="form-label">
                <div class="icon"></div>
                <div class="text">
                    <label>Click to Upload Feature Video</label>
                </div>
                <input class="form-control" id="video" name="videos[]" type="file" accept="video/*" onchange="previewVideos(event)" multiple required>
            </label>
            
            <div id="video-preview"></div>
            <br>


            <label for="image" class="custum-file-upload" class="form-label"><br>
                <div class="icon">

                </div>
                <div class="text">
                <label>Click to Upload Thembnail Image</label>
                </div>
                <input class="form-control" id="image" name="image[]" type="file" accept="image/*" onchange="previewImages(event)">
            </label>

            <div id="image-preview"></div>

            <br><br>
            
            <button type="submit" class="btn btn-xs pl-3 pe-3 " style="background:rgb(47,155,92);color:white">Submit</button>



        </form>

    </div>
</div>




<script>
    function previewVideos(event) {
        var previewContainer = document.getElementById('video-preview');
        previewContainer.innerHTML = ''; // Clear previous previews

        var files = event.target.files;

        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var reader = new FileReader();

            reader.onload = function (e) {
                var video = document.createElement('video');
                video.className = 'preview-video';
                video.src = e.target.result;
                video.controls = true; // Add controls to the video element

                var previewContainerDiv = document.createElement('div');
                previewContainerDiv.className = 'preview-container';
                previewContainerDiv.appendChild(video);

                previewContainer.appendChild(previewContainerDiv);
            };

            reader.readAsDataURL(file);
        }
    }
</script>


<script>
    function previewImages(event) {
        var previewContainer = document.getElementById('image-preview');
        previewContainer.innerHTML = ''; // Clear previous previews

        var files = event.target.files;

        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var reader = new FileReader();

            reader.onload = function (e) {
                var previewImage = document.createElement('img');
                previewImage.className = 'preview-image';
                previewImage.src = e.target.result;

                var previewContainerDiv = document.createElement('div');
                previewContainerDiv.className = 'preview-container';
                previewContainerDiv.appendChild(previewImage);

                previewContainer.appendChild(previewContainerDiv);
            };

            reader.readAsDataURL(file);
        }
    }

</script>



<script>
    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation-l')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {

                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>







@endsection
