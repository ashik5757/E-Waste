@extends('layout.app')


@section('title')
    E-Waste | Bogsite
@endsection


@section('more_link')
    <link rel="stylesheet" href="{{ asset('assets/css/blog_details.css') }}">
@endsection


@section('content')


<div class="main-banner header-text" id="top" style=" background: linear-gradient(to bottom, #dffbf0 30%, #ffffff 93%);">

    <div class="container home-con">
        <div class="half1">
            <h3 class="mt-5" style="color: rgb(65, 255, 144);font-size: 60px;">Blog Details Page</h3>
            <h1 class="mt-5"> <br><span class="txt"></span></h1>
                <p class="mt-4">  
                    
                    
                </p>



            <input type="button" value="Create Now" class="button_uv1">
        </div>
    </div>

    

</div>



<div class="container">

        <div class="card mb-3" style="width: 600px;">
            <div class="row g-0">
            <div class="col-md-4">
                <img src="..." class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text"><small class="text-body-secondary">Created 3 mins ago</small></p>

                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                </div>
            </div>
            </div>
        </div>


</div>



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








@endsection
    

